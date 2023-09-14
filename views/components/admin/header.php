<header class="admin-header flex-between">
    <section class="header-left flex-between">
        <a href="/" class="header-left__logo">
            <img class="header-left__logoImage" src="../../media/images/admin/flogo.svg" alt="Image Logo">
        </a>

        <div class="header-left__search">
            <div class="search-box flex-between">
                <input type="search" class="search-box__input" placeholder="Search ..." />
                <button type="button" class="search-box__submit"><i class="fa fa-solid fa-search"></i></button>
            </div>
        </div>
    </section>

    <section class="header-right flex-end">
        <section class="header-right__theme">
            <button class="header-right__themeButton" data-toggle="switch-theme"><i class="fa fa-solid fa-moon"></i></button>
        </section>

        <section class="header-right__notify">
            <div class="notify-box" data-toggle="popover" data-target="#notifyList" id="notifyBox">
                <button class="notify-box__icon"><i class="fa fa-solid fa-bell"></i></button>
                <div class="broadcast">
                    <span class="broadcast-kernel"></span>
                </div>
            </div>
            <div class="notify-frame popover" id="notifyList">
                <div class="notify-frame-item notify-frame-head">
                    <h3 class="notify-head__title">Notifications</h3>
                    <a href="#" class="notify-head__mark">Mark all as read</a>
                </div>
                <ul class="notify-content">
                    <li class="notify-frame-item">
                        <div class="notify-item__avatar">
                            <img src="../../media/images/placeholder.png" alt="" class="notify-item__avatarImage">
                        </div>
                        <div class="notify-item__content">
                            <h4 class="notify-account__name">Jessie Samson <span class="notify-account__recent">1h</span></h4>
                            <p class="notify-item__message">
                                Mentioned you in a comment.
                            </p>
                            <span class="notify-item__time">
                                9:11 AM August 7,2021
                            </span>
                        </div>
                    </li>

                    <li class="notify-frame-item _not--yet">
                        <div class="notify-item__avatar">
                            <img src="../../media/images/placeholder.png" alt="" class="notify-item__avatarImage">
                        </div>
                        <div class="notify-item__content">
                            <h4 class="notify-account__name">Jessie Samson <span class="notify-account__recent">1h</span></h4>
                            <p class="notify-item__message">
                                Mentioned you in a comment.
                            </p>
                            <span class="notify-item__time">
                                9:11 AM August 7,2021
                            </span>
                        </div>
                    </li>
                </ul>
                <div class="notify-frame-item notify-frame-foot">
                    <a href="#" class="notify-frame__footLink">Notification history</a>
                </div>
            </div>
        </section>

        <section class="header-right__account">
            <div class="account-box">
                <span class="account-box__avatar">
                    <img src="../../../media/images/placeholder.png" alt="" class="account-box__avatarImage">
                </span>
            </div>
        </section>
    </section>
</header>