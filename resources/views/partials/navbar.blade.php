<style>
    .nav-dropdown {

        /* display: block; */
        min-width: 13rem;
        border-radius: 30px;
        border: none;
        margin-left: 0px !important;
        margin-top: 10px;
        padding: 20px 0px 20px 20px;

    }

    .nav-dropdown .dropdown-item {
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 140%;
        /* identical to box height, or 28px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-Black */
        font-weight: 400;
        color: #323232;
    }

    .nav-dropdown .dropdown-item:hover {
        background: none;
        color: #592F74;
        font-weight: 700;
    }

    .main-navigation #navbarTogglerDemo03 .dropdown-toggle::after {
        content: none;
    }

    .our-team-section .our-team-section-heading {
        /* Our Team */


        width: 1204px;
        height: 53px;
        font-style: normal;
        font-weight: 600;
        font-size: 48px;
        line-height: 110%;
        /* identical to box height, or 53px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-Black */

        color: #323232;


        /* Inside auto layout */

        flex: none;
        order: 0;
        align-self: stretch;
        flex-grow: 0;
    }

    .team-block {
        /* background: #FFFFFA; */
        padding: 25px;
        border-radius: 32px;
        border: 2px solid #F1F2ED;
    }

    .team-block .team-img img {
        height: auto;
        width: 100%;
        border-radius: 10px;
    }

    .team-block .team-heading h4 {

        /* H4-Web_Headline */

        font-family: 'Playfair Display';
        font-style: normal;
        font-weight: 700;
        font-size: 24px;
        line-height: 120%;
        /* identical to box height, or 29px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-Purple */

        color: #F47E27;


        /* Inside auto layout */

        flex: none;
        order: 0;
        flex-grow: 0;
    }

    .team-block .team-heading p {
        font-family: 'Playfair Display';
        font-style: normal;
        font-weight: 700;
        font-size: 16px;
        line-height: 120%;

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;
        color: #592F74;
    }

    .team-block .team-text {
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 140%;
        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;
        color: #323232;
    }

    .why-mice-section .why-mice-section-heading {

        font-style: normal;
        font-weight: 700;
        font-size: 48px;
        line-height: 110%;
        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;
        color: #323232;
    }

    .why-mice-section .why-mice-section-desc {
        width: 1204px;
        height: 84px;
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 140%;
        /* or 28px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-Black */

        color: #323232;


        /* Inside auto layout */

        /* flex: none;
        order: 1;
        align-self: stretch;
        flex-grow: 0; */
        margin-top: 10px;
    }

    .why-mice-section .why-mice-service .nav-item:first-child::after {
        content: none;
    }

    .why-mice-section .why-mice-service .nav-item::after {
        content: '';
        height: 49%;
        width: 1px;
        right: 0;
        top: -35px;
        position: relative;
        display: flex;
        background-color: #323232;
    }

    .why-mice-section .why-mice-service .nav-item .nav-link {
        padding: 0px 55px 0px 56px;
    }

    .why-mice-section .service-desc {
        position: relative;
        padding: 95px;
        border-radius: 32px;
        background-color: #592F74;
        /* margin-top: 70px; */
    }

    .why-mice-section .service-desc h4 {
        font-style: normal;
        font-weight: 700;
        font-size: 24px;
        line-height: 120%;
        /* or 29px */

        text-align: center;
        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;
        color: #FFFFFA;

        flex: none;
        order: 0;
        flex-grow: 0;
    }

    .why-mice-section .service-desc:before,
    .why-mice-section .service-desc:after {
        content: '';
        display: block;
        position: absolute;
        bottom: 89%;
        width: 0;
        height: 0;
        margin-bottom: 3px;
    }

    .why-mice-section .service-desc:after {
        left: 115px;
        border: 20px solid transparent;
        border-top-color: #fff;
    }

    .why-mice-section .why-mice-block .why-mice-list {
        width: 715px;
        /* height: 448px; */

        /* BodySmall_Web */

        font-family: 'Adelle Sans';
        font-style: normal;
        font-weight: 400;
        font-size: 24px;
        line-height: 140%;
        /* or 28px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-Black */

        color: #323232;


        /* Inside auto layout */

        flex: none;
        order: 1;
        align-self: stretch;
        flex-grow: 0;
        padding: 20px;
    }

    .why-mice-section .why-mice-block .why-mice-list li {
        padding-bottom: 20px;
    }

    .why-mice-section .why-mice-block {
        padding-top: 70px;
    }

    .why-mice-block-2 .why-mice-content p {
        font-style: normal;
        font-weight: 700;
        font-size: 20px;
        line-height: 140%;
        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;
        color: #FFFFFA;
        flex: none;
        order: 0;
        flex-grow: 0;
    }

    .why-mice-block-2 .why-mice-content h4 {
        font-family: 'Adelle Sans' !important;
        font-style: normal;
        font-weight: 700;
        font-size: 24px;
        line-height: 120%;
        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        color: #FFC91C;

        flex: none;
        order: 1;
        flex-grow: 0;
    }

    .why-mice-block-2 {
        background-color: #592F74;
        border-radius: 32px;
        padding: 30px;
    }

    .why-mice-block-2 .why-mice-img-2 {
        width: 300px;
        height: auto;
        border-radius: 16px;
    }

    .btn-get-in-touch {
        padding: 15px 50px 15px 50px;

        font-family: 'Adelle Sans';
        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 100%;
        background-color: #F47E27;
        display: flex;
        align-items: center;
        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;
        color: #FFFFFA;
        flex: none;
        order: 0;
        flex-grow: 0;
        border-radius: 48px;
        position: relative;
        top: 12%;
    }

    .partner-with-us-block .pt-desc {
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 140%;
        /* or 28px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-Black */

        color: #323232;


        /* Inside auto layout */

        flex: none;
        order: 0;
        flex-grow: 1;
    }

    .partner-us-sections .partner-title h3 {
        width: 483px;
        height: 38px;
        font-family: 'Playfair Display';
        font-style: normal;
        font-weight: 700;
        font-size: 32px;
        line-height: 120%;
        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;
        color: #FFFFFA;
        flex: none;
        order: 0;
        align-self: stretch;
        flex-grow: 0;
    }

    .partner-us-sections .partner-title p {
        width: 483px;
        height: 84px;

        /* BodySmall_Web */

        font-family: 'Adelle Sans';
        font-style: normal;
        font-weight: 400;
        font-size: 20px;
        line-height: 140%;
        /* or 28px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-White */

        color: #FFFFFA;


        /* Inside auto layout */

        flex: none;
        order: 0;
        flex-grow: 1;
        margin-top: 25px;
    }

    .partner-us-sections {
        padding: 50px;
        background-color: #592F74;
        border-radius: 32px;
    }

    .partner-id {
        position: absolute;
        bottom: 0px;
        left: 0px;
        right: 0px;
    }

    .partner-title-marketing {
        height: 550px;
    }

    .partner-title-marketing h3 {
        /* Sales & Marketing */


        width: 999px;
        height: 38px;

        /* H3 - Web_Headline */

        font-family: 'Playfair Display';
        font-style: normal;
        font-weight: 700;
        font-size: 32px;
        line-height: 120%;
        /* or 38px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-White */

        color: #FFFFFA;


        /* Inside auto layout */

        flex: none;
        order: 0;
        align-self: stretch;
        flex-grow: 0;
    }

    .partner-title-marketing p {
        /* Sales & Marketing */


        width: 999px;

        font-family: 'Adelle Sans';
        font-style: normal;
        font-weight: 400;
        font-size: 20px;
        line-height: 140%;
        /* or 28px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-White */

        color: #FFFFFA;


        /* Inside auto layout */

        flex: none;
        order: 0;
        flex-grow: 1;
        margin-top: 25px;
    }

    .enquiry-form-popup .organiser-information {
        width: 704px;
        height: 29px;

        font-style: normal;
        font-weight: 700;
        font-size: 24px;
        line-height: 120%;
        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;
        color: #323232;
        margin-bottom: 25px;
        font-family: 'Playfair Display';
    }

    .enquiry-form-popup .event-information {
        width: 704px;
        height: 29px;

        font-style: normal;
        font-weight: 700;
        font-size: 24px;
        line-height: 120%;
        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;
        color: #323232;
        margin-bottom: 25px;
        font-family: 'Playfair Display';
    }

    .enquiry-form-popup .modal-body {
        padding: 50px;
        padding-top: 0px;
    }

    .enquiry-form-popup .modal-header {
        border: none;
        padding: 8px;
        padding-right: 30px;
    }

    .enquiry-form-popup .modal-header button {
        font-size: 30px;
    }

    .btn:hover {
        background-color: #FFC91C;
        color: #fffffa;
    }

    .blog-pagination .page-item:first-child .page-link,
    .blog-pagination .page-item:last-child .page-link {
        background-color: #592F74;
        border-radius: 50%;
        color: #FFFFFA;

    }

    .blog-pagination .page-link {
        padding: 0px 15px 0px 15px;
        background-color: transparent;
        border: none;
        color: #32323280;

        font-family: 'Playfair Display';
        font-style: normal;
        font-weight: 700;
        font-size: 32px;
        line-height: 120%;
        /* or 38px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        flex: none;
        order: 0;
        flex-grow: 0;
    }

    .blog-pagination .page-item.active .page-link {
        z-index: 3;
        color: #323232;
        background: none;
    }

    .frame-service-desc-day-outs {

        background-color: #592F74;
        border-radius: 32px;
        padding: 60px;
        margin-left: -10px;
        margin-right: -10px;
        /* height: 757px; */

    }

    .frame-service-desc-day-outs h3 {
        /* Day Outs & ODCs */


        /* width: 1033px; */

        /* H3 - Web_Headline */

        font-family: 'Playfair Display';
        font-style: normal;
        font-weight: 700;
        font-size: 32px;
        line-height: 120%;
        /* or 38px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-White */

        color: #FFFFFA;


        /* Inside auto layout */

        flex: none;
        order: 0;
        align-self: stretch;
        flex-grow: 0;
    }

    .frame-service-desc-day-outs h6 {

        width: 1033px;
        /* SubheadSmall_Emphasis_Web */

        font-family: 'Adelle Sans';
        font-style: normal;
        font-weight: 700;
        font-size: 24px;
        line-height: 110%;
        /* or 26px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-White */

        color: #FFFFFA;


        /* Inside auto layout */

        flex: none;
        order: 0;
        flex-grow: 1;
    }

    .frame-service-desc-day-outs .frame-service-text {

        /* width: 1033px; */

        /* BodySmall_Web */

        font-family: 'Adelle Sans';
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 140%;
        /* or 28px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-White */

        color: #FFFFFA;


        /* Inside auto layout */

        flex: none;
        order: 0;
        flex-grow: 1;
    }

    .frame-service-desc-day-outs p {

        /* width: 1033px; */

        /* BodySmall_Emphasis_Web */

        font-family: 'Adelle Sans';
        font-style: normal;
        font-weight: 700;
        font-size: 20px;
        line-height: 140%;
        /* identical to box height, or 28px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-White */

        color: #FFFFFA;


        /* Inside auto layout */

        flex: none;
        order: 0;
        flex-grow: 1;
    }

    .organisar-information {
        height: 240px;
    }

    .organisar-information .back span {

        font-style: normal;
        font-weight: 700;
        font-size: 16px;
        line-height: 120%;
        letter-spacing: 0.02em;
        text-transform: uppercase;
        font-feature-settings: 'pnum'on, 'lnum'on;
        color: #323232;
    }

    .organisar-information .organisar-heading h3 {

        font-style: normal;
        font-weight: 600;
        font-size: 48px;
        line-height: 110%;

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;
        color: #592F74;
    }

    .borders-right {
        border-right: 1px solid #FFC91C;
    }

    #enquiry_form .form-group {
        margin-bottom: 2rem;
    }

    .main-navigation .nav-item .contact-btn {
        background-color: #F47E27;
        color: #FFFFFA;

        font-style: normal;
        font-weight: 700;
        font-size: 14px;
        line-height: 100%;
        /* identical to box height, or 20px */

        /* display: flex; */
        /* align-items: center; */
        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;
        padding: 10px 17px 10px 17px;
        border-radius: 48px;
    }

    .main-navigation .nav-item .contact-btn:hover {
        background-color: #FFC91C;
    }

    .partner-us-sections .sales-and-marketing {
        width: 999px;
        height: 224px;

        /* BodySmall_Web */

        font-family: 'Adelle Sans';
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 140%;
        /* or 28px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-White */

        color: #FFFFFA;


        /* Inside auto layout */

        flex: none;
        order: 0;
        flex-grow: 1;
        /* margin-top: 30px; */
        padding: 20px;
    }

    .h-content-property .location-detail p {

        font-style: normal;
        font-weight: 700;
        font-size: 20px;
        line-height: 140%;
        /* identical to box height, or 28px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-Purple */

        color: #592F74;
        margin-top: 15px;
    }

    .location-block .location-heading h2 {
        font-style: normal;
        font-weight: 700;
        font-size: 48px;
        line-height: 110%;
        /* identical to box height, or 53px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-Black */

        color: #323232;


        /* Inside auto layout */

        flex: none;
        order: 0;
        align-self: stretch;
        flex-grow: 0;
    }

    .location-block .location-heading p {
        /* Bangalore */


        /* width: 97px; */
        height: 28px;

        /* BodySmall_Emphasis_Web */

        font-family: 'Adelle Sans';
        font-style: normal;
        font-weight: 700;
        font-size: 20px;
        line-height: 140%;
        /* identical to box height, or 28px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-Purple */

        color: #592F74;


        /* Inside auto layout */

        flex: none;
        order: 1;
        flex-grow: 0;
        margin-top: 20px;
    }

    .location-block .location-address {
        width: 444px;
        height: 84px;

        /* BodySmall_Web */

        font-family: 'Adelle Sans';
        font-style: normal;
        font-weight: 400;
        font-size: 20px;
        line-height: 140%;
        /* or 28px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-Black */

        color: #323232;


        /* Inside auto layout */

        flex: none;
        order: 1;
        flex-grow: 0;
        margin-top: 30px;
    }

    .location-block {
        height: 686px;
        padding: 30px;
    }

    .location-block .location-section {
        padding: 80px;
    }

    .location-block .location-section hr {
        border-top: 1px solid #000;
        margin-top: 30px;
    }

    .frame-property-section h2 {
        font-style: normal;
        font-weight: 700;
        font-size: 32px;
        line-height: 110%;
        /* identical to box height, or 53px */

        text-align: center;
        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-Black */

        color: #323232;


        /* Inside auto layout */

        flex: none;
        order: 0;
        flex-grow: 0;
    }

    .dayouts,
    .hotelowners,
    .tourhandling {
        margin-top: 15px !important;
    }

    .service-input-section {
        width: 33%;
        float: left;
        margin-left: 6px
    }

    .location-input-section {
        width: 26%;
        float: left;
    }

    .date-input-section {
        width: 22%;
        float: left;
    }

    .search-button-section {
        width: 17%;
        float: right;
    }

    .partner-img {
        width: 70%;
    }

    .why-mice-section .why-mice-service .nav-item .nav-link .why-us-img {
        height: 48px;
        width: 65px;
    }

    .footer-social-link ul {
        list-style-type: none;
        padding: 10px;
        margin: 0;
        margin-top: 25px;
        border: 1px solid #FFFFFA;
        border-radius: 15px;
    }

    .footer-social-link li {
        display: inline-block;
    }

    .footer-social-link a i {
        display: block;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
        margin-right: 25px;
        color: #fff;
        font-size: 25px;
    }

    .footer-social-link ul li:last-child a i {
        margin-right: 0px;
    }

    .footer-menus li a {
        /* Caption_Web */

        font-family: 'Adelle Sans';
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 140%;
        /* or 22px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-White */

        color: #FFFFFA;
    }

    .copyright-text {
        font-style: normal;
        font-weight: 400;
        font-size: 20px;
        line-height: 140%;
        /* identical to box height, or 28px */

        text-align: center;
        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-White */

        color: #FFFFFA;
        position: relative;
        font-family: 'Playfair Display' !important;
    }

    .copyright-provider p {
        /* Caption_Web */

        font-family: 'Adelle Sans';
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 140%;
        /* or 22px */

        text-align: center;
        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-White */

        color: #FFFFFA;

    }

    .why-mice-block .why-mice-section-heading {
        font-style: normal;
        font-weight: 600;
        font-size: 48px;
        line-height: 110%;
        /* identical to box height, or 53px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        /* Mice-Black */

        color: #323232;


        /* Inside auto layout */

        flex: none;
        order: 0;
        align-self: stretch;
        flex-grow: 0;
    }

    @media only screen and (max-width: 1400px) and (min-width: 1200px) {
        .copyright-text:after {
            right: 0%;
            width: 260px;
        }

        .copyright-text:before {
            left: 0%;
            width: 260px;
        }

    }

    @media only screen and (max-width: 960px) and (min-width: 570px) {
        .copyright-text:after {
            right: 0%;
            width: 155px;
        }

        .copyright-text {
            font-size: 16px;
        }

        .copyright-text:before {
            left: 0%;
            width: 155px;
        }

        .banner-form-demo .search-content {
            width: 62%;
        }
    }

    @media only screen and (max-width: 1200px) and (min-width: 992px) {
        .c-logo {
            width: 80%;
        }

        .main-navigation .navbar-collapse .navbar-nav .nav-link {
            padding-left: 10px;
            padding-right: 10px;
        }

        .main-navigation .navbar-nav .nav-link {
            font-size: 14px;
        }

        .main-navigation .nav-item .contact-btn {
            padding: 9px 14px 9px 14px;
            font-size: 14px;
        }

        .service-menu .nav-item .nav-link span {
            font-size: 12px;
            align-items: center;
            margin-top: 0px;
        }

        .service-menu .nav-item .nav-link img {
            margin-top: 0px;
        }

        .service-menu .nav-item:nth-child(3) .nav-link span::after {
            margin-top: 10px;
        }

        .service-menu .nav-item:nth-child(5) .nav-link span::after {
            margin-top: 10px;
        }

        .service-menu .nav-item .nav-link {
            padding: 0px 7px;
        }

        .service-menu .nav-item .nav-link span::after {
            margin-left: 12px;
        }

        .dayouts,
        .hotelowners,
        .tourhandling {
            margin-top: 0 !important;
        }

        .service-menu .nav-item .nav-link .hotelowners,
        .service-menu .nav-item .nav-link .hotelowners {
            padding-left: 30px;
        }

        .h-content-section h1 {
            font-size: 37px;
        }

        .h-content-section p {
            font-size: 15px;
            margin-top: 20px;
        }

        .banner-form-demo .search-content {
            /*width: 65%;*/
        }

        .service-input-section .input-group-prepend .input-group-text img {
            width: 17px;
        }

        .location-input-section .input-group-prepend .input-group-text img {
            width: 17px;
        }

        .date-input-section .input-group-prepend .input-group-text img {
            width: 17px;
        }

        .banner-form-demo label {
            font-size: 12px;
            padding-left: 35px;
        }

        .banner-form-demo {
            /*margin-left: 90px;
            top: -160px;*/
        }

        .banner-form-demo .input-group-prepend span {
            padding: 5px 5px 0px 10px;
        }

        .service-toggle {
            width: 170px;
            font-size: 14px;
        }

        .location-toggle {
            font-size: 14px;
        }

        #reservation {
            padding: 0px;
            margin-top: -5px;
            font-size: 14px;
        }

        .location-input-section {
            width: 26%;
            float: left;
        }

        .search-button-section {
            width: 16%;
            float: right;
        }

        .frame-63 h2 {
            font-size: 40px
        }

        .cta-large {
            padding: 0px 0px 0px 0px;
            width: 150px;
            height: 40px
        }

        .btn-viewhotel {
            font-size: 15px
        }

        .frame-76 {
            font-size: 23px;
        }

        .frame-56-bg {
            padding-bottom: 40px;
        }

        .attachment-block .attachment-img {
            margin-top: 5px;
            max-width: 35px
        }

        .attachment-pushed {
            margin-left: 50px !important;
        }

        .attachment-text {
            font-size: 14px;
        }

        .frame-56-border {
            height: 200px;
        }

        .frame-20 {
            padding-bottom: 45px;
        }

        .frame-20 h1 {
            font-size: 60px;
        }

        .frame-20 span {
            font-size: 16px;
        }

        .btn-contact-us {
            font-size: 14px;
        }

        .frame-47 h1 {
            font-size: 37px;
        }

        .frame-47 p {
            font-size: 15px;
        }

        .frame-61 .blog-nav-tabs .blog-card-title h3 {
            font-size: 25px;
        }

        .blog-nav-tabs .nav-link {
            font-size: 17px;
        }

        .btn-subscribe {
            font-size: 18px;
        }

        .content-pane p {
            font-size: 14px
        }

        .service-menu .nav-item .nav-link span.active {
            margin-top: 0px;
        }

        .frame-81 h1 {
            font-size: 36px;
        }

        .frame-service-desc {
            padding: 50px;
            height: auto;
        }

        .frame-service-desc h3 {
            /* width: 0px; */
            height: 25px;
            font-size: 26px;
        }

        .frame-service-desc .frame-service-text {
            /* width: 0px; */
            font-size: 16px;
        }

        .frame-service-desc p {
            /* width: 0px; */
            font-size: 16px;
        }

        .wedding-service h1 {
            font-size: 37px;
        }

        .frame-service-desc-day-outs {
            padding: 40px;
            height: auto;
        }

        .frame-service-desc-day-outs h3 {
            width: auto;
            font-size: 25px;
        }

        .frame-service-desc-day-outs h6 {
            width: auto;
            font-size: 20px;
        }

        .frame-service-desc-day-outs .frame-service-text {
            width: auto;
            font-size: 16px;
        }

        .frame-service-desc-day-outs p {
            width: auto;
            font-size: 17px;
        }

        .why-mice-section .why-mice-section-heading {
            font-size: 38px
        }

        .why-mice-section .why-mice-section-desc {
            width: auto;
            font-size: 16px;
        }

        .why-mice-section .why-mice-service .nav-item .nav-link {
            padding: 0px 42px 0px 42px;
        }

        .why-mice-section .why-mice-service .nav-item .nav-link .why-us-img {
            height: 48px;
            width: 65px;
        }

        .why-mice-section .service-desc:before,
        .why-mice-section .service-desc:after {
            margin-bottom: 8px
        }

        .why-mice-section .service-desc h4 {
            font-size: 20px;
        }

        .why-mice-section .why-mice-block .why-mice-list {
            width: auto;
            font-size: 17px;
        }

        .why-mice-block-2 .why-mice-img-2 {
            width: 250px;
        }

        .why-mice-block-2 .why-mice-content p {
            font-size: 17px;
        }

        .why-mice-block-2 .why-mice-content h4 {
            font-size: 24px;
        }

        .our-team-section .our-team-section-heading {
            width: auto;
            height: auto;
            font-size: 38px;
        }

        .team-block .team-img img {
            width: 100%;
            height: auto;
        }

        .team-block .team-heading h4 {
            font-size: 20px;
        }

        .team-block .team-text {
            font-size: 16px;
            width: auto;
        }

        .contact-detail h1 {
            font-size: 38px;
        }

        .contact-detail .contact-address {
            padding: 35px;
        }

        .address-detail h3 {
            font-size: 25px;
        }

        .address-detail p {
            width: auto;
            font-size: 16px;
        }

        .contact-card .contact-us {
            font-size: 16px;
        }

        .contact-card span {
            font-size: 16px;
        }

        .blog-heading {
            font-size: 32px;
        }

        .blog-img img {
            width: 95%;
        }

        .blog-content .blog-headings {
            font-size: 28px;
        }

        .blog-content .blog-desc {
            font-size: 16px;
        }

        .btn-get-in-touch {
            padding: 15px 35px 15px 35px;
            font-size: 16px;
        }

        .partner-with-us-block .pt-desc {
            font-size: 16px;
        }

        .partner-us-sections .partner-title h3 {
            width: auto;
            font-size: 28px;
        }

        .partner-us-sections .partner-title p {
            width: auto;
            font-size: 17px;
        }

        .partner-us-sections .sales-and-marketing {
            width: auto;
            font-size: 16px;
        }

        .footer-social-link ul {
            padding: 5px;
        }

        .footer-social-link a i {
            font-size: 20px;
        }

        .footer-menus li a {
            font-size: 14px;
        }

        .copyright-text:after,
        .copyright-text:before {
            width: 185px
        }

        .copyright-text {
            font-size: 17px;
        }

        .service-navbar {
            /*margin-top: 5rem; */
            transform: translateY(100%);
        }

        .service-navbar-item {
            padding-top: 25px;
            padding-bottom: 10px;
        }

        .service-navbar-item .service-navbar-menu span {
            font-size: 10px;
        }

        .header-margin {
            margin-top: 13rem;
        }

        .frame-3466 {
            margin-top: 12rem;
        }

        .service-title h4 {
            font-size: 20px;
        }

        .service-text p {
            font-size: 14px;
        }

        .mice-button-text {
            font-size: 13px;
        }

        .mice-button {
            width: 120px;
            height: 45px;
        }

        .service-tab {
            height: 470px;
        }

        .service-img img {
            height: 200px;
        }
    }

    .navbar-toggler.collapsed>.close,
    .navbar-toggler:not(.collapsed)>.navbar-toggler-icon {
        display: none;
    }

    .navbar-toggler>.close {
        display: inline;
    }

    .navbar-toggler-icon::before {
        content: "\f0c9";
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        font-size: 1.5rem;
    }

    .navbar-light .navbar-toggler-icon {
        background-image: none;
    }

    .navbar-light .navbar-toggler {
        color: #323232;
        border: none;
    }

    .close,
    .mailbox-attachment-close {
        color: #323232;
        opacity: unset;
    }

    @media only screen and (min-width: 1127.1px) and (max-width: 1439px) {
        .service-img img {
            height: 225px;
        }
    }

    @media only screen and (min-width: 768px) {
        .service-img img {
            height: 225px;
        }
    }

    .service-mobile .pmd-input-group {
        /*border: 1px solid #F1F2ED;
        padding-left: 25px; 
        border-radius: 51px;
        box-shadow: 2.57994px 2.57994px rgba(0, 0, 0, 0.08);
        padding-bottom: 6px;
        padding-top: 2px;
        background-color: #fff;*/
    }

    .service-mobile .pmd-input-group .input-group-text {
        padding: 0px;
        background: none;
        border: none;
    }

    .service-mobile .pmd-input-group .pmd-textfield .service-field-m {
        height: auto;
        padding: 0px;
        width: 100%;
        font-size: 10px;
        border: none;
        text-overflow: ellipsis;
        margin-top: 0px;
    }

    .service-mobile .pmd-input-group .pmd-textfield .service-field-m::placeholder {
        font-family: 'Adelle Sans';
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 140%;
        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;
        color: #323232;
    }

    .service-mobile .pmd-input-group .pmd-textfield .service-field-m[readonly] {
        background: none;
    }

    .service-mobile .pmd-input-group .pmd-textfield label {
        font-family: 'Adelle Sans';
        font-style: normal;
        font-weight: 400;
        font-size: 12px;
        line-height: 140%;
        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;
        color: #323232;
        margin-bottom: 0px
    }

    .menuTopService .navbar-text {
        display: block;
        color: #323232;
        font-weight: 400;
        padding-left: 0px;
        padding-right: 0px;
        font-size: 14px;
        cursor: pointer;
    }

    .menuTopService {
        margin-left: -8px;
        margin-right: -7px;
    }

    .our-mission h1 {

        font-family: 'Playfair Display';
        font-style: normal;
        font-weight: 600;
        font-size: 48px;
        line-height: 110%;

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;

        color: #323232;
    }

    .our-mission-list {
        list-style-type: none;
        padding: 10px;

        font-family: 'Adelle Sans';
        font-style: normal;
        font-weight: 400;
        line-height: 140%;
        /* or 34px */

        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;
        color: #323232;
    }

    .our-mission-list li {
        padding-bottom: 15px;
    }

    .our-mission-list li b {
        font-size: 20px;
        font-weight: 700;
        color: #592F74;
    }

    .our-mission p {
        font-style: normal;
        font-weight: 700;
        font-size: 24px;
        line-height: 140%;
        letter-spacing: 0.02em;
        font-feature-settings: 'pnum'on, 'lnum'on;
        color: #592F74;
    }

    .our-mission-block {
        background-color: #f1f2ed;
        padding-top: 30px;
        padding-bottom: 30px;
        margin-right: 20px;
        margin-left: 20px;
        border-radius: 16px;
    }

    .owl-carousel-blog {
        z-index: 0;
    }

    .menu-search-bar {
        /*box-shadow: 0px 2.57994px 2.57994px rgba(0, 0, 0, 0.08);*/
        border: 0.644985px solid #F1F2ED;
        border-radius: 64px;
        padding-bottom: 4px
    }

    .menu-search-bar .input-group-text img {
        width: 17px
    }

    .menu-search-bar .search-content .input-group {
        flex-wrap: unset
    }

</style>
<nav class="navbar navbar-expand-lg navbar-light fixed-top main-navigation row" style="border-bottom: 1px solid #F1F2ED;">
   <div class="col-md-3 col-8 d-flex align-items-center">
    <a class="navbar-brand navbarLogo mb-0" href="{{route('home')}}" style="flex-shrink:0;">
        <img src="{{asset('images/mice-logo.gif')}}" class="c-logo" alt="" style="height:55px; width:auto;">
    </a>
  
</div>
    
   
    <!--<div class="col-md-6 menu-search-bar d-none d-lg-block d-xl-block d-xl-none">
        <?php $states = App\Models\Property::getStates();
        ?>
        <div class="banner-form-demo">
            <form action="{{route('search-service')}}" method="GET">
                <div class="search-content">
                    <div class="service-input-section">
                        <label class="selectService" style="cursor: pointer;">Services <i class="fas fa-angle-down rotate"></i></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><img src="{{asset('images/assignment.svg')}}"></span>
                            </div>
                            <?php
                            if (request()->is("/*") || request()->is("search*") || request()->is("hotels*") || request()->is("contact-us*")) {
                                $className = "dropdown";
                                $readOnly = "";
                                $disabled = "disabled";
                            } else {
                                $className = "dropdown";
                                $readOnly = "readonly";
                                $disabled = "";
                            }

                            ?>
                            <div class="{{$className}} dropdown-service dropdown-mega position-static">
                                <input type="text" class="dropdown-toggle service-toggle inputValueField" name="service" id="service" value="{{$selectedService ?? ''}}" placeholder="Choose Service" {{$readOnly}} />

                                <div class="dropdown-menu service-dropdown shadow">
                                    <div class="mega-service-conttext px-4">
                                        <div class="" style="margin-top: 20px; margin-bottom: 20px;">
                                            <?php

                                            foreach (App\Models\Services::getServices() as $service) { ?>
                                                <div class="row">
                                                    <?php
                                                        if (count($service) == 4) {
                                                            foreach ($service as $value) { ?>
                                                    <div class="col">
                                                        <div class="service-card" onclick="selectService(event,'<?php echo trans("content.".$value['slug']); ?>')">
                                                            <div class="service-image d-flex justify-content-center">
                                                                <img src="<?php echo asset('images/'.$value['img_path']); ?>" alt="" class="img-thumbnails" />
                                                            </div>
                                                            <div class="service-text-dropdown d-flex justify-content-center my-3">
                                                                <span><?php echo trans("content.".$value['slug']); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php  }
                                                        } else {
                                                            $left = 4 - count($service);
                                                            foreach ($service as $value) { ?>
                                                    <div class="col">
                                                        <div class="service-card" onclick="selectService(event,'<?php echo trans("content.".$value['slug']); ?>')">
                                                            <div class="service-image d-flex justify-content-center">
                                                                <img src="<?php echo asset('images/'.$value['img_path']); ?>" alt="" class="img-thumbnails" />
                                                            </div>
                                                            <div class="service-text-dropdown d-flex justify-content-center my-3">
                                                                <span><?php echo trans("content.".$value['slug']); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php  }
                                                            for ($i = 0; $i < $left; $i++) {
                                                                echo "<div class='col'></div>";
                                                            }
                                                        }


                                                        ?>
                                                </div>

                                            <?php    }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="location-input-section">
                        <label class="selectLocation" style="cursor: pointer;">Location <i class="fas fa-angle-down rotatel"></i></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><img src="{{asset('images/locatore.svg')}}"></span>
                            </div>
                            <div class="dropdown dropdown-location dropdown-mega position-static">


                                <input type="text" class="dropdown-toggle location-toggle inputValueField" id="location" name="location" value="{{request()->get('location')}}" placeholder="Choose Location" readonly="">

                                <div class="dropdown-menu service-location shadow">
                                    <div class="mega-content px-4">
                                        <div class="" style="margin-top: 20px; margin-bottom: 20px;">
                                            <div class="row">
                                                <div class="col-3" style="padding-top: 10px;">
                                                    <div class="list-group" id="list-tab" role="tablist">
                                                        @foreach($states as $state)
                                                        <a onmouseover="openCity(event, '{{$state->region}}')" class="list-group-item list-group-item-action @if($state->region=='karnataka') {{"active"}} @endif" id="list-{{$state->region}}-list" data-toggle="tab" href="#list-{{$state->region}}" role="tab" aria-controls="{{$state->region}}">
                                                            <div class="d-flex justify-content-around">
                                                                <p>{{ucfirst($state->region)}}</p>
                                                                <i class="fas fa-angle-right"></i>
                                                            </div>
                                                        </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-9" style="background-color: #F1F2ED; border-radius: 16px; padding-top: 10px; padding-bottom:10px">
                                                    <div class="tab-content tab-location" id="nav-tabContent">
                                                        @foreach($states as $state)
                                                        <div class="tab-pane fade @if($state->region=='karnataka') {{"show active"}} @endif" id="{{$state->region}}" role="tabpanel" aria-labelledby="list-{{$state->region}}-list">
                                                            <div class="row">
                                                                <?php
                                                                $list_items = App\Models\Property::getCityByState($state->region);
                                                                if ($state->region == "karnataka") {

                                                                    array_push($list_items[0], "coorg", "mysore", "medikeri", "sakleshpur", "shimoga");
                                                                }
                                                                foreach ($list_items as $items) {
                                                                    echo  '<div class="col-3 d-flex justify-content-center"><ul class="list-group">';
                                                                    foreach ($items as $value) { ?>
                                                                <li class="list-group-item">
                                                                    <a href="javascript:void(0);" onclick="selectLocation(event, '<?php echo ucfirst($value); ?>')" class="tab-location">
                                                                        <?php echo ucfirst($value); ?>
                                                                    </a>
                                                                </li>
                                                                <?php }
                                                                    echo '</ul></div>';
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="date-input-section">
                        <label for="reservation" style="cursor: pointer;">Date <i class="fas fa-angle-down"></i></label>
                        <div class="input-group mb-3 reservation-block">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><img src="{{asset('images/calender.svg')}}"></span>
                            </div>
                            <input type="text" class="form-control float-right reservation" name="dates" id="reservation" value="{{request()->get('dates')}}" placeholder="Select Dates">
                        </div>
                    </div>
                    <div class="search-button-section">
                        <button style="position:absolute; right:10px" class="mice-button-search mice-button-text searchButton" type="submit" {{$disabled}}>Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
  


    <div class="collapse navbar-collapse" id="navbarTogglerDemo03" style="position:absolute; left:50%; top:50%; transform:translate(-50%, -50%);">
        <ul class="navbar-nav d-none d-sm-flex align-items-center" style="margin:0;">
            <li class="nav-item {{ request()->is("/*") ? "active" : "" }}" style="margin-right:25px">
                <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ request()->is('why-mice*') ? 'active' : '' }}" style="margin-right:25px">
                <a class="nav-link" href="{{route('why-mice')}}">About Us</a>
            </li>
            <li class="nav-item {{ request()->is('blogs*') ? 'active' : '' }}" style="margin-right:25px">
                <a class="nav-link" href="{{route('blogs.index',__('pagination.defaultPage'))}}">Blog</a>
            </li>
            <li class="nav-item {{ request()->is('contact-us*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('contact-us')}}">Contact Us</a>
            </li>
        </ul>
    </div>

    <ul class="navbar-nav d-flex d-sm-none" style="margin-left:auto;">
       <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" id="openNavBtn" style="text-align:center">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.33333 6.66667C2.875 6.66667 2.5 6.29167 2.5 5.83333C2.5 5.375 2.875 5 3.33333 5H16.6667C17.125 5 17.5 5.375 17.5 5.83333C17.5 6.29167 17.125 6.66667 16.6667 6.66667H3.33333ZM3.33333 10.8333H16.6667C17.125 10.8333 17.5 10.4583 17.5 10C17.5 9.54167 17.125 9.16667 16.6667 9.16667H3.33333C2.875 9.16667 2.5 9.54167 2.5 10C2.5 10.4583 2.875 10.8333 3.33333 10.8333ZM3.33333 15H16.6667C17.125 15 17.5 14.625 17.5 14.1667C17.5 13.7083 17.125 13.3333 16.6667 13.3333H3.33333C2.875 13.3333 2.5 13.7083 2.5 14.1667C2.5 14.625 2.875 15 3.33333 15Z" fill="#323232" />
                </svg>
            </a>
        </li>
    </ul>

<div class="col-md-2 d-none d-sm-flex align-items-center justify-content-end ml-auto" style="gap:10px;">
    <a href="https://www.facebook.com/MiceHospitality16" target="_blank" style="background:#F47E27; border-radius:50%; width:36px; height:36px; display:flex; align-items:center; justify-content:center; color:#fff;">
        <i class="fab fa-facebook-f" style="font-size:14px;"></i>
    </a>
    <a href="https://www.instagram.com/micehospitalityservices/" target="_blank" style="background:#F47E27; border-radius:50%; width:36px; height:36px; display:flex; align-items:center; justify-content:center; color:#fff;">
        <i class="fab fa-instagram" style="font-size:14px;"></i>
    </a>
    <a href="https://www.linkedin.com/company/micehospitalityservices/" target="_blank" style="background:#F47E27; border-radius:50%; width:36px; height:36px; display:flex; align-items:center; justify-content:center; color:#fff;">
        <i class="fab fa-linkedin-in" style="font-size:14px;"></i>
    </a>
    <a href="https://wa.me/919611804368" target="_blank" style="background:#F47E27; border-radius:50%; width:36px; height:36px; display:flex; align-items:center; justify-content:center; color:#fff;">
        <i class="fab fa-whatsapp" style="font-size:14px;"></i>
    </a>
</div>

                
                
            <!--
                <li class="nav-item" style="border:1px solid #F1F2ED; border-radius:100px">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.33333 6.66667C2.875 6.66667 2.5 6.29167 2.5 5.83333C2.5 5.375 2.875 5 3.33333 5H16.6667C17.125 5 17.5 5.375 17.5 5.83333C17.5 6.29167 17.125 6.66667 16.6667 6.66667H3.33333ZM3.33333 10.8333H16.6667C17.125 10.8333 17.5 10.4583 17.5 10C17.5 9.54167 17.125 9.16667 16.6667 9.16667H3.33333C2.875 9.16667 2.5 9.54167 2.5 10C2.5 10.4583 2.875 10.8333 3.33333 10.8333ZM3.33333 15H16.6667C17.125 15 17.5 14.625 17.5 14.1667C17.5 13.7083 17.125 13.3333 16.6667 13.3333H3.33333C2.875 13.3333 2.5 13.7083 2.5 14.1667C2.5 14.625 2.875 15 3.33333 15Z" fill="#323232" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 5C13.66 5 15 6.34 15 8C15 9.66 13.66 11 12 11C10.34 11 9 9.66 9 8C9 6.34 10.34 5 12 5ZM6 15.98C7.29 17.92 9.5 19.2 12 19.2C14.5 19.2 16.71 17.92 18 15.98C17.97 13.99 13.99 12.9 12 12.9C10 12.9 6.03 13.99 6 15.98Z" fill="#323232" />
                        </svg>
                    </a>
                  <div class="dropdown-menu menu-bar">
                        @if(Auth::check())
                            <a href="#" class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 5C13.66 5 15 6.34 15 8C15 9.66 13.66 11 12 11C10.34 11 9 9.66 9 8C9 6.34 10.34 5 12 5ZM6 15.98C7.29 17.92 9.5 19.2 12 19.2C14.5 19.2 16.71 17.92 18 15.98C17.97 13.99 13.99 12.9 12 12.9C10 12.9 6.03 13.99 6 15.98Z" fill="#323232"/>
                                </svg> <span style="font-weight:700">{{Auth::user()->name}}</span>
                            </a>
                            <div class="dropdown-divider"></div>
                             <a class="dropdown-item" href="{{route('web-login.profile')}}">My Profile</a>
                             <div class="dropdown-divider"></div>
                        @else
                           <a class="dropdown-item" href="javascript:void(0);"  data-toggle="modal" data-target="#registerModel">Sign Up</a>
                            <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#loginModel">Login</a> 
                        @endif
                        <a class="dropdown-item" href="{{route('why-mice')}}">About Us</a>
                        <a class="dropdown-item" href="{{route('blogs.index',__('pagination.defaultPage'))}}">Blog</a>
                        @if(Auth::check())
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item btn contactBtn" href="{{route('contact-us')}}">Contact Us</a>
                    </div>
                </li>
            </ul> 
            
        </div>
        <!--
        <ul class="navbar-nav ml-auto d-flex d-sm-none">
            <li class="nav-item" style="border:1px solid #F1F2ED; border-radius:100px">
                <a class="nav-link" href="javascript:void(0)" id="openNavBtn" style="text-align:center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.33333 6.66667C2.875 6.66667 2.5 6.29167 2.5 5.83333C2.5 5.375 2.875 5 3.33333 5H16.6667C17.125 5 17.5 5.375 17.5 5.83333C17.5 6.29167 17.125 6.66667 16.6667 6.66667H3.33333ZM3.33333 10.8333H16.6667C17.125 10.8333 17.5 10.4583 17.5 10C17.5 9.54167 17.125 9.16667 16.6667 9.16667H3.33333C2.875 9.16667 2.5 9.54167 2.5 10C2.5 10.4583 2.875 10.8333 3.33333 10.8333ZM3.33333 15H16.6667C17.125 15 17.5 14.625 17.5 14.1667C17.5 13.7083 17.125 13.3333 16.6667 13.3333H3.33333C2.875 13.3333 2.5 13.7083 2.5 14.1667C2.5 14.625 2.875 15 3.33333 15Z" fill="#323232" />
                    </svg>
                    <!--
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 5C13.66 5 15 6.34 15 8C15 9.66 13.66 11 12 11C10.34 11 9 9.66 9 8C9 6.34 10.34 5 12 5ZM6 15.98C7.29 17.92 9.5 19.2 12 19.2C14.5 19.2 16.71 17.92 18 15.98C17.97 13.99 13.99 12.9 12 12.9C10 12.9 6.03 13.99 6 15.98Z" fill="#323232" />
                    </svg>
                    -->
                    
                </a>
            </li>
        </ul> 
    
        

    </div>
</nav>
@include('website.blocks.service-navbar')
