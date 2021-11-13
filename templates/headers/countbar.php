<div class="bg-golden" id="app">
    <div class="container mx-auto text-white">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

            <div>
                <div class="flex flex-col justify-center items-center p-10">
                    <countup :end-val="<?php echo wp_count_posts('project')->publish ?>" :delay="1000"></countup>
                    <p class="text-lg font-semibold">Projekte online</p>
                    <a href="<?php echo home_url('referenzen') ?>" class="block bg-darkblue text-white text-center shadow-lg px-5 py-3 mt-3">Zu den Projekten</a>

                </div>
            </div>


            <div class="flex flex-col justify-center items-center p-10">
                <countup :end-val="<?php echo wp_count_posts('immobilie')->publish ?>" :delay="2000"></countup>
                <p class="text-lg font-semibold">Wohneinheiten online</p>
                <a href="<?php echo get_post_type_archive_link('immobilie') ?>" class="block bg-darkblue text-white text-center shadow-lg px-5 py-3 mt-3">Zu den Immobilien</a>
            </div>


            <div>
                <div class="flex flex-col justify-center items-center p-10">
                    <countup :end-val="<?php echo wp_count_posts('team_member')->publish ?>" :delay="3000"></countup>
                    <p class="text-lg font-semibold">Teammitglieder</p>
                    <a href="<?php echo get_post_type_archive_link('team_member') ?>" class="block bg-darkblue text-white text-center shadow-lg px-5 py-3 mt-3">Zum Team</a>

                </div>
            </div>



        </div>
    </div>
</div>
