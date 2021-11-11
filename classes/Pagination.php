<?php


namespace davinci\codebase;


class Pagination {

	/* pagination  */
	public static function paginate($pages = '', $range = 4)
	{
		$showitems = ($range * 2)+1;

		global $paged;
		if(empty($paged)) $paged = 1;

		if($pages == '')
		{
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages)
			{ $pages = 1; }
		}


		if(1 != $pages)
		{
			echo '<nav class="flex justify-center my-12"><ul class="flex">';
			if($paged > 2 && $paged > $range+1 && $showitems < $pages){
				echo '<li><a href=" ' . get_pagenum_link(1). '" class="p-3 px-4 m-1 border border-darkblue text-darkblue">&laquo;</a></li>';
			}
			if($paged > 1 && $showitems < $pages){
				echo '<li><a href=" ' . get_pagenum_link($paged - 1). '" class="p-3  px-4 m-1 border border-darkblue text-darkblue">&lsaquo;</a></li>';
			}

			for ($i=1; $i <= $pages; $i++)
			{
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				{
					echo ($paged == $i) ? '<li><span class="p-3  px-4 m-1 bg-darkblue border border-darkblue text-golden">'.$i.'</span></li>'
						:"<li><a href='".get_pagenum_link($i)."' class=\"p-3 m-1 border border-darkblue text-darkblue \">".$i."</a></li>";
				}
			}

			if ($paged < $pages && $showitems < $pages) echo '<li><a href="' . get_pagenum_link($paged + 1) . '" class="p-3  px-4 m-1 border border-darkblue text-darkblue">&rsaquo;</a></li>';
			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo '<li><a href="' . get_pagenum_link($pages) . '" class="p-3  px-4  m-1 border border-darkblue text-darkblue">&raquo;</a></li>';

			echo '</ul></nav>';
		}
	}


}