(function ($) {
    $(document).ready(function() {
        $("select[name='city']").prop("disabled", true)
        $("select[name='country']").change(function() {
            if ($(this).val() != 0) {
                var id = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'index.php',
                    data: 'getCities='+id,
                    success: function(data){
                        $("select[name='city']").prop("disabled", false);
                        $("select[name='city']").html("");
                        data = JSON.parse(data);
                        var option = "<option disabled selected value = '0' > Choose your city </option>";
                        for (var i in data) {
                            var temp = "<option " + "value = '" + data[i]["id"] + "'>" + data[i]["city_name"] + "</option>";
                            option +=temp;
                        }
                        $("select[name='city']").append(option);
                    }
                });

               
            }
        });
        $(".form2 input[type='reset']").click(function() {
           $(".emphasize").remove();
           $(".inputError").removeClass("inputError");
           $(".inputSuccess").removeClass("inputSuccess");
        });
    });
})(jQuery);