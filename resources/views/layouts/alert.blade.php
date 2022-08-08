
<style>
    .alert {
        width: 34%;
        margin: 20px auto;
        padding: 20px 13px;
        position: fixed;
        border-radius: 5px;
        z-index: 99;
        top: 12%;
        right: 2%;
    }

    .alerts {
        margin: 20px auto;
        padding: 20px 13px;
        border-radius: 5px;
        z-index: 99;
        top: 12%;
        right: 2%;
    }
    .alert .btn-close{background-color: transparent;}
    .close {
        position: absolute;
        width: 30px;
        height: 30px;
        opacity: 0.5;
        border-width: 1px;
        border-style: solid;
        border-radius: 50%;
        right: 15px;
        top: 15px;
        text-align: center;
        font-size: 1.6em;
        cursor: pointer;
        line-height: 20px;
    }

    .success-alert {
        background-color: #a8f0c6;
        border-left: 5px solid #178344;
    }

    .success-alert .close {
        border-color: #178344;
        color: #178344;
    }

    .warning-alert {
        background-color: #db9913;
        border-left: 5px solid #836617;
    }

    .warning-alert .close {
        border-color: #c38716;
        color: #835817;
    }

    .error-alert {
        background-color: #ef270c;
        border-left: 5px solid #7a0d03;
    }

    .error-alert .close {
        border-color: #ef270c;
        color: #7a0d03;
    }
</style>


<script>
    window.setTimeout(function() {
    $(".alert").fadeOut(500, function(){
        $(this).remove(); 
    });
}, 4000);
</script>