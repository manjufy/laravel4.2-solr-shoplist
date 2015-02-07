var baseUrl = $('#baseUrl').val(); // town/add.blade.php look for hidden field baseUrl
console.log("Base URL = " + baseUrl);
jQuery(document).ready(function ($) {
    $('#country').change(function () {
        var countryId = $("#country option:selected").val();
        $.get(baseUrl + "/manager/api/state/" + countryId,
            { option: $(this).val() },
            function (data) {
                var model = $('#state');
                model.empty();

                $.each(data, function (index, element) {
                    model.append("<option value='" + element.id + "'>" + element.name + "</option>");
                });
            });
    });
});