var baseUrl = $('#baseUrl').val(); // town/add.blade.php look for hidden field baseUrl
console.log("Base URL = " + baseUrl);
jQuery(document).ready(function ($) {
    $('#state').change(function () {
        var stateId = $("#state option:selected").val();
        $.get(baseUrl + "/manager/api/town/" + stateId,
            { option: $(this).val() },
            function (data) {
                var model = $('#town');
                model.empty();

                $.each(data, function (index, element) {
                    model.append("<option value='" + element.id + "'>" + element.name + "</option>");
                });
            });
    });
});