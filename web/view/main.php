<?php
/**
 * Created by PhpStorm.
 * User: igortokman
 * Date: 20.03.16
 * Time: 21:46
 */
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>
        SearchFile Application
    </title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <style>

        .panel{
            margin: 10px auto;
            width: 550px;
        }

        table, .table {
            width: 80%;
            margin: 20px auto
        }

        #back_btn{
            margin: 0em 9em 2em;
        }

    </style>

</head>
<body>

<?php echo $content?>


<script>
    $(function(){
        //checks if some input is empty
        $('#dataInputForm').submit(function(e){

            var inputs = $(this).find('input');

            $.each(inputs,function(index,value){
                var input = $(value);
                var formGroup = input.parents('.form-group');

                if(input.val().length === 0){
                    e.preventDefault();
                    formGroup.addClass('has-error');
                    input.tooltip({
                        trigger: 'manual',
                        placement: 'right',
                        title: 'You must fill the field'
                    }).tooltip('show');
                }
                else
                {
                    formGroup.addClass('has-success');
                }
            });
        });

        $('form').on('keydown', 'input', function(e){
            $(this).tooltip('destroy').parent('.form-group').removeClass('has-error').addClass('has-success');
        });

    });
</script>
</body>
</html>