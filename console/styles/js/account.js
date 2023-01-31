$(document).ready(function () {
    let n = 0;
    let v = document.getElementById('account-info');

    $('.account_nick').click(function () {

        if(n === 0) {
            v.style.display = "block";
            $('#account_chevron').removeClass("fa-chevron-down");
            $('#account_chevron').addClass("fa-times");
            n = 1;
            return true;
        }

        if(n === 1) {
            v.style.display = "none";
            $('#account_chevron').addClass("fa-chevron-down");
            $('#account_chevron').removeClass("fa-times");
            n = 0;
            return true;
        }
    });

    $('#account_chevron').click(function () {

        if(n === 0) {
            v.style.display = "block";
            $('#account_chevron').removeClass("fa-chevron-down");
            $('#account_chevron').addClass("fa-times");
            n = 1;
            return true;
        }

        if(n === 1) {
            v.style.display = "none";
            $('#account_chevron').addClass("fa-chevron-down");
            $('#account_chevron').removeClass("fa-times");
            n = 0;
            return true;
        }
    });
    $('#account_how').click(function () {
        v.style.display = "none";
        $('#account_chevron').addClass("fa-chevron-down");
        $('#account_chevron').removeClass("fa-times");
        n = 0;
    });
    $('#account_cmd').click(function () {
        v.style.display = "none";
        $('#account_chevron').addClass("fa-chevron-down");
        $('#account_chevron').removeClass("fa-times");
        n = 0;
    });
});