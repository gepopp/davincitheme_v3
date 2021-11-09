<project-canvas-content id="<?php _e( 'Lage', 'davincigroup' ) ?>">
    <div class="container mx-auto p-5">
        <div class="grid grid-cols-4 gap-4">
            <div class="hidden md:block px-5 border-r border-golden">
                <h2 class="text-2xl text-golden mb-3">Kontakt</h2>
                <contact-form></contact-form>
            </div>
            <div class="col-span-4 lg:col-span-3">
                <div class="project-content">
					<?php $mapdata = get_field( 'field_5f22e291ee8a7' ); ?>
                    <bing-map credentials="AnoXaP39V-A8ZHepTumyPeIE-pVUuat5AORwerHj1S3IiNIrtsPuXQyadPmbQ4H2" :options="{
                            zoom : <?php echo $mapdata['zoom'] ?>,
                            center: { latitude: <?php echo $mapdata['lat'] ?>, longitude: <?php echo $mapdata['lng'] ?> }
                            }" style="height: 800px; width: 100%">
                        <bing-map-layer name="activeFlightsLayer">
                            <bing-map-pushpin :location="{ latitude: <?php echo $mapdata['lat'] ?>, longitude: <?php echo $mapdata['lng'] ?> }" :options=" { title: '<?php echo get_the_title() ?>', visible: true }"></bing-map-pushpin>
                        </bing-map-layer>
                    </bing-map>
                </div>
            </div>
        </div>
    </div>
</project-canvas-content>

