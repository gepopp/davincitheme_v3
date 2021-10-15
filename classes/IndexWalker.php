<?php


namespace davinci\codebase;


class IndexWalker
{


    /**
     * Currently filled Cols in a row
     *
     * @var int
     */
    protected $filled_cols = 0;


    /**
     * dertemine first row to close header bg after
     *
     * @var bool
     */
    protected $is_first_row = true;


    /**
     * holds all post_ids => cols to use
     *
     * @var array
     */
    protected $all_post_cols = [];


    /**
     * Color css classes
     *
     * @var string[]
     */
    protected $colors = ['lightblue' => 'bg-lightblue', 'darkblue' => 'bg-darkblue', 'turquise' => 'bg-turquise'];


    /**
     * layouts column span
     *
     * @var array
     */
    protected $layouts = ['full' => 4, 'fullreverse' => 4, 'half' => 2, 'quarter' => 1, 'eighth' => .5];


    /**
     * prefixed tag strings and template
     *
     *
     * @var array
     */
    protected $tags = [];

    /**
     * css classes to hide elements
     *
     * @var string[]
     */
    protected $hidden = ['hiddenmobile' => 'hidden lg:block', 'hiddendesktop' => 'lg:hidden'];


    /**
     * holds post id and layout cols to calculate next width
     *
     * @var array
     */
    protected $postColumns = [];


    /**
     * dertermine eighths in subcolumn
     *
     * @var int
     */
    protected $eighths = 0;


    protected $prefix = '';
    protected $cat = '';



    public function __construct()
    {
        if(is_front_page() || is_home()){
            $this->prefix = 'st';
            $this->cat = [27];
        }else{
	        $this->prefix = get_field('field_5f25b70bf11e8');
	        $this->cat = get_field('field_5f25af86cb0c1');
        }
    }


    function walk()
    {
        $this->setupTags();
        $this->setupPostColumns();

        $this->addPosts();

    }


    function addPosts()
    {

        $posts = $this->query();
        $this->openRow();

        if ($posts->have_posts()) {
            while ($posts->have_posts()) {
                $posts->the_post();
                $set = false;

                foreach ($this->tags as $tag => $rows) {

                    if (has_tag($tag)) {

                        $set = true;
                        $tag_arr = explode('-', $tag);
                        $template = array_pop($tag_arr);
                        $this->addBox($template, $rows);
                        break;

                    }

                }
                if(!$set){
                    $this->addBox('quarter', 1);
                }
            }
            wp_reset_postdata();
        }
        get_template_part('helper', 'close-body');
        $this->closeDiv(2);
    }


    public function addBox($template, $rows){


        $this->determineNewRow(get_the_ID());

        if($template == 'eighth'){
            $this->eighths++;
        }

        if($this->eighths == 1){
            echo '<div class="flex flex-col justify-between col-span-2 lg:col-span-1">';
        }

       get_template_part('frontpage', $template, ['bg' => $this->getColor(), 'hidden' => $this->getHidden()]);

        if($this->eighths == 2){
            $this->closeDiv();
            $this->eighths = 0;
        }

        $this->filled_cols += $rows;
    }


    public function getColor(){

        if(has_tag($this->prefix . '-turquise')){
            return 'bg-turquise';
        }

        if(has_tag($this->prefix . '-lightblue')){
            return 'bg-lightblue';
        }

        return 'bg-darkblue';

    }


    public function getHidden(){

        if(has_tag($this->prefix . 'hiddenmobile')){
            return 'hidden lg:block';
        }

        if(has_tag($this->prefix . 'hiddendesktop')){
            return 'lg:hidden';
        }

        return '';

    }


    public function determineNewRow($current_id)
    {

        if ($this->filled_cols + $this->postColumns[$current_id] > (float) 4) {

            if ($this->is_first_row) {
                $this->closeDiv(3);
	            get_template_part('helper','open-body');
                $this->is_first_row = false;
            }
            $this->newRow();
            $this->reset_cols_filled();
        }
    }

    /**
     * post - row assoc by tag - defaults to quarter layout
     */
    protected function setupPostColumns()
    {

        $posts = $this->query();
        if ($posts->have_posts()) {
            while ($posts->have_posts()) {
                $posts->the_post();

                $this->postColumns[get_the_ID()] = 1;

                foreach ($this->tags as $tag => $rows) {
                    if (has_tag($tag)) {
                        $this->postColumns[get_the_ID()] = $rows;
                        break;
                    }
                }

            }
            wp_reset_postdata();
        }else{
            ?>
            <div class="container mx-auto flex content-center justify-center flex-wrap h-64">
                <div class="w-1/2 centered">
                    <h2 class="text-golden text-3xl font-semibold"><?php echo __('Zu den von Ihnen eingegebenen Kriterien wurden keine Objekte gefunden. Bitte ändern Sie Ihre Filter oder Suchkriterien.', 'davincigroup') ?></h2>
                </div>
            </div>


            <?php
        }

    }


    /**
     * tag - row assoc with prefixed tags
     *
     * @param string $prefix
     */
    protected function setupTags()
    {


        foreach ($this->layouts as $layout => $rows) {

            $this->tags[$this->prefix == '' ? $layout : $this->prefix . '-' . $layout] = $rows;

        }

    }


    protected function newRow()
    {
        $this->closeDiv(2);
        $this->openRow();
    }


    /**
     * start a new grid row
     */
    protected function openRow()
    {
        echo '<div class="container mx-auto">';
        echo '<div class="grid grid-cols-1 lg:grid-cols-4 lg:gap-10 mb-10 px-3 lg:px-0 min-grid">';
    }


    /**
     * close div x $times
     *
     * @param int $times
     */
    protected function closeDiv($times = 1)
    {
        for ($i = 1; $i <= $times; $i++) {
            echo '</div>';
        }
    }


    /**
     * on new row cols filled are 0
     */
    protected function reset_cols_filled()
    {
        $this->filled_cols = 0;
    }


    /**
     * setup query object for posts to walk throug
     *
     * @TODO make query params custizeable by construct for archive pages and filters
     *
     * @return \WP_Query
     */
    protected function query()
    {

        $args = [
            'post_type'      => ['project', 'frontpage'],
            'post_status'    => 'publish',
            'cat'            => $this->cat,
            'posts_per_page' => -1,
        ];
        if(in_array(27, $this->cat)){
            $args['orderby']        = 'menu_order';
            $args['order']          = 'ASC';
        }

        if(!empty($_GET['type']) || ( isset($_GET['location']) && $_GET['location'] )){
            $args['tax_query'] = ['relation' => 'AND'];
        }

        if(!empty($_GET['type'])){
            $args['tax_query'][] = [
                'taxonomy' => 'project_type',
                'field'    => 'ID',
                'terms'    => explode(',', $_GET['type']),
            ];
        }

        if(isset($_GET['location']) && $_GET['location']){
            $args['tax_query'][] = [
                'taxonomy' => 'project_location',
                'field'    => 'ID',
                'terms'    => explode(',', $_GET['location']),
            ];
        }

        return new \WP_Query($args);

    }

}
