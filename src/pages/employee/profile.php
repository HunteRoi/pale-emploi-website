<?php include "./handlers/employee/profile_handler.php" ?>

<link href="/assets/css/profile.css" rel="stylesheet">
<div class="container container-sm d-flex justify-content-center">
    <section class="container">
        <?php
        echo
            "<h2 class=\"mt-5\">" . $employee . "</h2>" .
            "<ul class=\"list-unstyled\">" .
            "<li>" . $employee->email . "</li>" .
            (isset($employee->company) ? "<li>" . $employee->company . "</li>" : "") .
            "</ul>";
        ?>
        <div class="btn btn-primary mt-3 mb-3">CV</div>
        <div title="Informations sur le fichier enregistré pour <?php echo "..." ?>"
            data-tn-element="indeed-resume-card" data-tn-variant="element" data-tn-action-click="true"
            class="css-1773tqo esu7hk30">
            <div class="css-srfrud e1gufzzf0">
                <div class=" css-1kbtny3 e37uo190">
                    <div class="css-1e9y1g e37uo190">
                        <div class="css-1epf9yb eu4oa1w0"><svg width="44" height="64" viewBox="0 0 44 64" fill="none"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="">
                                <path
                                    d="M26 1.09384C26 0.489727 26.4897 0 27.0938 0C27.674 0 28.2305 0.230486 28.6408 0.640755L43.3592 15.3592C43.7695 15.7695 44 16.326 44 16.9062C44 17.5103 43.5103 18 42.9062 18H28C26.8954 18 26 17.1046 26 16L26 1.09384Z"
                                    fill="#D4D2D0"></path>
                                <path
                                    d="M0 2C0 0.895431 0.895431 0 2 0H27C28.1046 0 29 0.895431 29 2V13C29 14.1046 29.8954 15 31 15H42C43.1046 15 44 15.8954 44 17V62C44 63.1046 43.1046 64 42 64H2C0.895431 64 0 63.1046 0 62V2Z"
                                    fill="#E4E2E0"></path>
                                <path
                                    d="M6 7C6 6.44772 6.44772 6 7 6H21C21.5523 6 22 6.44772 22 7C22 7.55228 21.5523 8 21 8H7C6.44772 8 6 7.55228 6 7Z"
                                    fill="#D4D2D0"></path>
                                <path
                                    d="M6 11C6 10.4477 6.44772 10 7 10H21C21.5523 10 22 10.4477 22 11C22 11.5523 21.5523 12 21 12H7C6.44772 12 6 11.5523 6 11Z"
                                    fill="#D4D2D0"></path>
                                <path
                                    d="M6 15C6 14.4477 6.44772 14 7 14H21C21.5523 14 22 14.4477 22 15C22 15.5523 21.5523 16 21 16H7C6.44772 16 6 15.5523 6 15Z"
                                    fill="#D4D2D0"></path>
                                <path
                                    d="M6 21C6 20.4477 6.44772 20 7 20H37C37.5523 20 38 20.4477 38 21C38 21.5523 37.5523 22 37 22H7C6.44772 22 6 21.5523 6 21Z"
                                    fill="#D4D2D0"></path>
                                <path
                                    d="M6 25C6 24.4477 6.44772 24 7 24H37C37.5523 24 38 24.4477 38 25C38 25.5523 37.5523 26 37 26H7C6.44772 26 6 25.5523 6 25Z"
                                    fill="#D4D2D0"></path>
                                <path
                                    d="M6 29C6 28.4477 6.44772 28 7 28H37C37.5523 28 38 28.4477 38 29C38 29.5523 37.5523 30 37 30H7C6.44772 30 6 29.5523 6 29Z"
                                    fill="#D4D2D0"></path>
                                <path
                                    d="M6 33C6 32.4477 6.44772 32 7 32H37C37.5523 32 38 32.4477 38 33C38 33.5523 37.5523 34 37 34H7C6.44772 34 6 33.5523 6 33Z"
                                    fill="#D4D2D0"></path>
                                <path d="M0 44H44V62C44 63.1046 43.1046 64 42 64H2C0.895431 64 0 63.1046 0 62V44Z"
                                    fill="#2557a7"></path><text aria-hidden="true" class="css-or7wqn e1wnkr790">
                                    <tspan x="10" y="58">PDF</tspan>
                                </text>
                            </svg></div>
                        <div class="css-4rov4i eu4oa1w0"><span class=" css-smaipe e1wnkr790"><span
                                    class="css-34k6dz e1wnkr790"><span sr-only="true"
                                        class="css-8u2krs esbq1260">cv_prenom_nom.pdf</span></span></span><span
                                class="css-nab397 e1wnkr790">Ajouté le Jul 8, 2021</span></div>
                    </div>
                    <div class="css-x02f3 eu4oa1w0"><input aria-label="Upload Resume" data-testid="file-upload-input"
                            type="file" style="display: none; visibility: hidden;" accept=".pdf,.txt,.docx,.doc,.rtf">
                        <button aria-haspopup="true" aria-controls="menu--4"
                            aria-label="Menu du fichier de CV enregistré" data-tn-element="open-saved-file-menu-btn"
                            data-tn-variant="element" data-tn-action-click="true" class="e8ju0x50 css-hmfc7m ex6cvhv1"
                            id="menu-button--menu--4" type="button" data-reach-menu-button=""><svg
                                xmlns="http://www.w3.org/2000/svg" focusable="false" role="img" fill="currentColor"
                                viewBox="0 0 24 24" aria-label="Ouvrir le menu du fichier de CV enregistré"
                                class="css-1f4rn1b eac13zx0">
                                <path
                                    d="M12 7c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 3c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 7c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z">
                                </path>
                            </svg></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <h2 class="mt-5 sect2-title">Améliorez la pertinence de vos offres</h2>
        <a data-tn-element="link-to-qualifications" data-tn-variant="element" data-tn-action-click="true"
            class="css-es7v8c" href="#">
            <div class="css-ra8ckx e37uo190">
                <div class="css-1waj6v4 eu4oa1w0">
                    <h3 class="css-tixvpt e1tiznh50">Qualifications</h3>
                    <span class="css-jcj5hu e1wnkr790">Mettez vos compétences et votre expérience en avant.</span>
                </div>
            </div>
        </a>
        <a data-tn-element="link-to-qualifications" data-tn-variant="element" data-tn-action-click="true"
            class="css-es7v8c" href="#">
            <div class="css-ra8ckx e37uo190">
                <div class="css-1waj6v4 eu4oa1w0">
                    <h3 class="css-tixvpt e1tiznh50">Préférence d"emploi</h3>
                    <span class="css-jcj5hu e1wnkr790">Précisez certaines informations, telles que le salaire
                        minimum et l"horaire désirés.</span>
                </div>
            </div>
        </a>
        <a data-tn-element="link-to-qualifications" data-tn-variant="element" data-tn-action-click="true"
            class="css-es7v8c" href="#">
            <div class="css-ra8ckx e37uo190">
                <div class="css-1waj6v4 eu4oa1w0">
                    <h3 class="css-tixvpt e1tiznh50">Masquer les offres avec ces détails</h3>
                    <span class="css-jcj5hu e1wnkr790">Mettez vos compétences et votre expérience en avant.</span>
                </div>
            </div>
        </a>
        <p class="lead">

        </p>
        <a class="btn btn-primary mt-3" href="#">Aide</a>
    </section>
</main>
