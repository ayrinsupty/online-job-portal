{{-- <link rel="preconnect" href="https://fonts.gstatic.com"> --}}
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/backend/assets/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('/backend/assets/vendors/iconly/bold.css') }}">
<link rel="stylesheet" href="{{ asset('/backend/assets/vendors/choices.js/choices.min.css') }}" />
<link rel="stylesheet" href="{{ asset('/backend/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('/backend/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
<link rel="stylesheet" href="{{ asset('/backend/assets/css/app.css') }}">
<link rel="stylesheet"
    href="{{ asset('/backend/assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('/backend/assets/vendors/fontawesome/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('/backend/assets/vendors/toastify/toastify.css') }}">
<link rel="stylesheet" href="{{ asset('/backend/assets/vendors/summernote/summernote-lite.min.css') }}">
<style>
    table.dataTable td {
        padding: 15px 8px;
    }

    .fontawesome-icons .the-icon svg {
        font-size: 24px;
    }
</style>
<style>
    /* General Styling */
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        padding: 1rem;
    }

    @media (max-width: 567px) {
        h1 {
            font-size: 7vw;
            text-align: center;
        }
    }


    /* Loader Styles start here */
    .loader-wrapper {
        --line-width: 5px;
        --curtain-color: #f1faee;
        --outer-line-color: #00aeef;
        --middle-line-color: #000000;
        --inner-line-color: #e5be22;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1000;
    }

    .loader {
        display: block;
        position: relative;
        top: 50%;
        left: 50%;
        /*   transform: translate(-50%, -50%); */
        width: 150px;
        height: 150px;
        margin: -75px 0 0 -75px;
        border: var(--line-width) solid transparent;
        border-top-color: var(--outer-line-color);
        border-radius: 100%;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
        z-index: 1001;
    }

    .loader:before {
        content: "";
        position: absolute;
        top: 4px;
        left: 4px;
        right: 4px;
        bottom: 4px;
        border: var(--line-width) solid transparent;
        border-top-color: var(--inner-line-color);
        border-radius: 100%;
        -webkit-animation: spin 3s linear infinite;
        animation: spin 3s linear infinite;
    }

    .loader:after {
        content: "";
        position: absolute;
        top: 14px;
        left: 14px;
        right: 14px;
        bottom: 14px;
        border: var(--line-width) solid transparent;
        border-top-color: var(--middle-line-color);
        border-radius: 100%;
        -webkit-animation: spin 1.5s linear infinite;
        animation: spin 1.5s linear infinite;
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    .loader-wrapper .loader-section {
        position: fixed;
        top: 0;
        background: var(--curtain-color);
        width: 51%;
        height: 100%;
        z-index: 1000;
    }

    .loader-wrapper .loader-section.section-left {
        left: 0
    }

    .loader-wrapper .loader-section.section-right {
        right: 0;
    }

    /* Loaded Styles */
    .loaded .loader-wrapper .loader-section.section-left {
        transform: translateX(-100%);
        transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    }

    .loaded .loader-wrapper .loader-section.section-right {
        transform: translateX(100%);
        transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    }

    .loaded .loader {
        opacity: 0;
        transition: all 0.3s ease-out;
    }

    .loaded .loader-wrapper {
        visibility: hidden;
        transform: translateY(-100%);
        transition: all .3s 1s ease-out;
    }
</style>