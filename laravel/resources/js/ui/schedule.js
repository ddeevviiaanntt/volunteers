var $ = require('wetfish-basic');

$(document).ready(function()
{
    // This event handler dynamically populates the available shifts within departments
    $('.department-dropdown').on('change', function()
    {
        var department = $(this).value();

        // Remove any dynamically created shift options
        $('.shift-dropdown .dynamic').remove();

        if(department)
        {
            var shifts = JSON.parse($('.available-shifts').value());
            var saved = $('.shift-dropdown').data('saved');

            if(shifts[department] && shifts[department].length)
            {
                $('.shift-warning').addClass('hidden');

                shifts[department].forEach(function(shift)
                {
                    var option = document.createElement('option');
                    $(option).text(shift.name);
                    $(option).value(shift.id);
                    $(option).addClass('dynamic');

                    // If the current shift ID matches the saved shift ID
                    if(shift.id == saved)
                    {
                        $(option).attr('selected', true);
                    }

                    $('.shift-dropdown').append(option);
                });
            }
            else
            {
                $('.shift-warning').removeClass('hidden');
            }
        }
    });

    $('.custom-wrap select').on('change', function()
    {
        // If custom was selected
        if($(this).value() == 'custom')
        {
            $(this).parents('.custom-wrap').find('.custom').removeClass('hidden');
        }
        // If no default value was selected
        else if($(this).value() == '')
        {
            // Check if there's a saved custom value
            var custom = $(this).parents('.custom-wrap').find('.custom input').value();

            // If this custom value is not found in the list of options, it must actually be a custom value
            if(!$(this).parents('.custom-wrap').find('select option[value="'+ custom +'"]').el.length)
            {
                $(this).value('custom').trigger('change');
            }
        }
        else
        {
            $(this).parents('.custom-wrap').find('.custom').addClass('hidden');
        }
    });

    $('.edit-schedule input[name="date_enabled"]').on('change', function()
    {
        if(this.checked)
        {
            $('.date-fields, .preview').removeClass('hidden');
        }
        else
        {
            $('.date-fields, .preview').addClass('hidden');
        }
    });

    $('.edit-schedule input[name="does-slot-repeat"]').on('change', function()
    {
        if(this.checked)
        {
            $('.slot-repeat').removeClass('hidden');
        }
        else
        {
            $('.slot-repeat').addClass('hidden');
        }
    });

    // Trigger change on page load to show / hide custom fields
    $('.department-dropdown').trigger('change');
    $('.custom-wrap select').trigger('change');
    $('.edit-schedule input[name="date_enabled"]').trigger('change');
});
