<template>
  <div>
    <carousel :data="data" indicator-type="line"></carousel>
  </div>
</template>

<script>
export default {
  name: "AgileSlider",
  data() {
    return {
      data: [
        ' <div class="columns">\n' +
        '                    <div class="column" style="padding: 30px">\n' +
        '                        <div class="border-animation">\n' +
        '                            <span class="line-1"></span>\n' +
        '                            <span class="line-2"></span>\n' +
        '                            <span class="line-4"></span>\n' +
        '                            <span class="line-5"></span>\n' +
        '                            <img src="/wp-content/themes/da_vinci_group/resources/assets/images/visual1.png" class="image">\n' +
        '                        </div>\n' +
        '                    </div>' +
        '<div class="is-overlay" style="margin: 30px">' +
        '<div class="box" style="width: 75%; height: 25%; position: absolute;bottom: 15px;left: -2px;background-color: rgba(255,255,255,.75)">' +
        '<h3 class="title has-text-primary" style="font-family: Times New Roman, Times, serif">Gartenresidenz 11.33</h3>' +
        '<h4 class="subtitle">Schweitzertalstrasse 39, Wien</h4>' +
        '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt, dolores et explicabo laboriosam minus nobis quaerat quidem repellat sed sit! Aliquam amet harum ipsa laudantium maiores necessitatibus quam rerum sed.</p>' +
        '</div>' +
        '</div>' +
        '\n</div>',
        ' <div class="columns">\n' +
        '                    <div class="column" style="padding: 30px">\n' +
        '                        <div class="border-animation">\n' +
        '                            <span class="line-1"></span>\n' +
        '                            <span class="line-2"></span>\n' +
        '                            <span class="line-4"></span>\n' +
        '                            <span class="line-5"></span>\n' +
        '                            <img src="/wp-content/themes/da_vinci_group/resources/assets/images/visual1.png" class="image">\n' +
        '                        </div>\n' +
        '<div class="is-overlay" style="margin: 30px">' +
        '<div class="box" style="width: 75%; height: 25%; position: absolute;bottom: 15px;left: -2px;background-color: rgba(255,255,255,.75)">' +
        '<h3 class="title has-text-primary" style="font-family: Times New Roman, Times, serif">Gartenresidenz 11.33</h3>' +
        '<h4 class="subtitle">Schweitzertalstrasse 39, Wien</h4>' +
        '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt, dolores et explicabo laboriosam minus nobis quaerat quidem repellat sed sit! Aliquam amet harum ipsa laudantium maiores necessitatibus quam rerum sed.</p>' +
        '</div>' +
        '                    </div>\n</div>',
        ' <div class="columns">\n' +
        '                    <div class="column" style="padding: 30px">\n' +
        '                        <div class="border-animation">\n' +
        '                            <span class="line-1"></span>\n' +
        '                            <span class="line-2"></span>\n' +
        '                            <span class="line-4"></span>\n' +
        '                            <span class="line-5"></span>\n' +
        '                            <img src="/wp-content/themes/da_vinci_group/resources/assets/images/visual1.png" class="image">\n' +
        '                        </div>\n' +
        '                    </div>\n' +
        '<div class="is-overlay" style="margin: 30px">' +
        '<div class="box" style="width: 75%; height: 25%; position: absolute;bottom: 15px;left: -2px;background-color: rgba(255,255,255,.75)">' +
        '<h3 class="title has-text-primary" style="font-family: Times New Roman, Times, serif">Gartenresidenz 11.33</h3>' +
        '<h4 class="subtitle">Schweitzertalstrasse 39, Wien</h4>' +
        '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt, dolores et explicabo laboriosam minus nobis quaerat quidem repellat sed sit! Aliquam amet harum ipsa laudantium maiores necessitatibus quam rerum sed.</p>' +
        '</div>' +
        '</div>' +
        '</div>',
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