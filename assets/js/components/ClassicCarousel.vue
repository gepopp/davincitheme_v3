<template>
  <div>
    <carousel :data="data" indicator-type="line"></carousel>
  </div>
</template>

<script>
export default {
  name: "ClassicCarousel",
  data() {
    return {
      data: [
        ' <div class="columns">\n' +
        '                    <div class="column is-6-desktop" style="padding: 30px">\n' +
        '                        <div class="border-animation">\n' +
        '                            <span class="line-1"></span>\n' +
        '                            <span class="line-2"></span>\n' +
        '                            <span class="line-4"></span>\n' +
        '                            <span class="line-5"></span>\n' +
        '                            <img src="/wp-content/themes/da_vinci_group/resources/assets/images/visual1.png" class="image">\n' +
        '                        </div>\n' +
        '                    </div>\n' +
        '                    <div class="column is-4-desktop is-offset-2-desktop">\n' +
        '                        <h1 class="title has-text-primary has-text-weight-normal\t">\n' +
        '                            Gartenresidenz 11.33\n' +
        '                        </h1>\n' +
        '                        <h2 class="subtitle">\n' +
        '                            Schweizertalstraße 39, 1130 Wien\n' +
        '                        </h2>\n' +
        '                        <p>Seit unserem Bestehen konnten wir neben\n' +
        '                            Einfamilien- und Reihenhäusern auch über\n' +
        '                            30 Wohnbauprojekte entwickeln.\n' +
        '                            Für unsere Kunden schaffen wir mit Modernität,\n' +
        '                            durchdachten Grundrissen und solider\n' +
        '                            Ausstattung ein harmonisches Wohnambiente.\n' +
        '                        </p>\n' +
        '                        <p>\n' +
        '                            Nur hochwertige Immobilien weisen jenen\n' +
        '                            Wertzuwachs auf, den sich die anspruchsvolle\n' +
        '                            Klientel der Da Vinci Group erwartet.\n' +
        '                        </p>\n' +
        '                        <a href="#" class="button is-primary is-outlined is-fullwidth mt-5">\n' +
        '                            Objektdetails' +
        '                        </a>\n' +
        '                    </div>\n' +
        '                </div>',
        ' <div class="columns">\n' +
        '                    <div class="column is-6-desktop" style="padding: 30px">\n' +
        '                        <div class="border-animation">\n' +
        '                            <span class="line-1"></span>\n' +
        '                            <span class="line-2"></span>\n' +
        '                            <span class="line-4"></span>\n' +
        '                            <span class="line-5"></span>\n' +
        '                            <img src="/wp-content/themes/da_vinci_group/resources/assets/images/visual1.png" class="image">\n' +
        '                        </div>\n' +
        '                    </div>\n' +
        '                    <div class="column is-4-desktop is-offset-2-desktop">\n' +
        '                        <h1 class="title has-text-primary has-text-weight-normal\t">\n' +
        '                            Gartenresidenz 11.33\n' +
        '                        </h1>\n' +
        '                        <h2 class="subtitle">\n' +
        '                            Schweizertalstraße 39, 1130 Wien\n' +
        '                        </h2>\n' +
        '                        <p>Seit unserem Bestehen konnten wir neben\n' +
        '                            Einfamilien- und Reihenhäusern auch über\n' +
        '                            30 Wohnbauprojekte entwickeln.\n' +
        '                            Für unsere Kunden schaffen wir mit Modernität,\n' +
        '                            durchdachten Grundrissen und solider\n' +
        '                            Ausstattung ein harmonisches Wohnambiente.\n' +
        '                        </p>\n' +
        '                        <p>\n' +
        '                            Nur hochwertige Immobilien weisen jenen\n' +
        '                            Wertzuwachs auf, den sich die anspruchsvolle\n' +
        '                            Klientel der Da Vinci Group erwartet.\n' +
        '                        </p>\n' +
        '                        <a href="#" class="button is-primary is-outlined is-fullwidth mt-5">\n' +
        '                            Objektdetails\n' +
        '                        </a>\n' +
        '                    </div>\n' +
        '                </div>',
        ' <div class="columns">\n' +
        '                    <div class="column is-6-desktop" style="padding: 30px">\n' +
        '                        <div class="border-animation">\n' +
        '                            <span class="line-1"></span>\n' +
        '                            <span class="line-2"></span>\n' +
        '                            <span class="line-4"></span>\n' +
        '                            <span class="line-5"></span>\n' +
        '                            <img src="/wp-content/themes/da_vinci_group/resources/assets/images/visual1.png" class="image">\n' +
        '                        </div>\n' +
        '                    </div>\n' +
        '                    <div class="column is-4-desktop is-offset-2-desktop">\n' +
        '                        <h1 class="title has-text-primary has-text-weight-normal\t">\n' +
        '                            Gartenresidenz 11.33\n' +
        '                        </h1>\n' +
        '                        <h2 class="subtitle">\n' +
        '                            Schweizertalstraße 39, 1130 Wien\n' +
        '                        </h2>\n' +
        '                        <p>Seit unserem Bestehen konnten wir neben\n' +
        '                            Einfamilien- und Reihenhäusern auch über\n' +
        '                            30 Wohnbauprojekte entwickeln.\n' +
        '                            Für unsere Kunden schaffen wir mit Modernität,\n' +
        '                            durchdachten Grundrissen und solider\n' +
        '                            Ausstattung ein harmonisches Wohnambiente.\n' +
        '                        </p>\n' +
        '                        <p>\n' +
        '                            Nur hochwertige Immobilien weisen jenen\n' +
        '                            Wertzuwachs auf, den sich die anspruchsvolle\n' +
        '                            Klientel der Da Vinci Group erwartet.\n' +
        '                        </p>\n' +
        '                        <a href="#" class="button is-primary is-outlined is-fullwidth mt-5">\n' +
        '                            Objektdetails\n' +
        '                        </a>\n' +
        '                    </div>\n' +
        '                </div>',
      ],
    };
  },
};
</script>
<style>
.carousel__indicators {
  bottom: -50px !important;
}

</style>