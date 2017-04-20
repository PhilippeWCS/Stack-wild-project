$(document).ready(function () {
    var profil = $('#fos_user_profile_form_profil').val();
    $('#villeEcole, #emploi').addClass('form-row-hide');

    if (profil == ''){
        $('#villeEcole, #emploi').addClass('form-row-hide');
    }
    else if(profil == 'Ancien élève'){
        $('#villeEcole, #emploi').removeClass('form-row-hide');
    }
    else if (profil == 'Elève' || profil == 'Staff formateur' || profil == 'Staff manager et autre'){
        $('#villeEcole').removeClass('form-row-hide');
    }

    $('#fos_user_profile_form_profil').change(function (){
        profil = $('#fos_user_profile_form_profil').val();

        if (profil == ''){
            $('#villeEcole, #emploi').addClass('form-row-hide');
            $('#villeEcole input, #emploi input').val('');
        }
        else if (profil == 'Elève' || profil == 'Staff formateur' || profil == 'Staff manager et autre'){
            $('#villeEcole').removeClass('form-row-hide');
            $('#emploi').addClass('form-row-hide');
            $('#emploi input').val('');
        }
        else if ($('#fos_user_profile_form_profil').val() == 'Ancien élève'){
            $('#villeEcole, #emploi').removeClass('form-row-hide');
        }
    });
})