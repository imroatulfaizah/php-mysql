<?php
function getPagingQuery($sql, $itemPerPage)
{
	if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
		$page = (int)$_GET['page'];
	} else {
		$page = 1;
		
	}
	
	$offset = ($page - 1) * $itemPerPage;
	
	return $sql . " LIMIT $offset, $itemPerPage";
}


function getPagingLink($href, $sql, $itemPerPage, $page, $strGet = '')
{
	include "../../koneksi.php";
	$result        = mysqli_query($koneksi,$sql);
	$pagingLink    = '';
	$totalResults  = mysqli_num_rows($result);
	$totalPages    = ceil($totalResults / $itemPerPage);
    $pageof        = $page;
	$numLinks      = 5;



	if ($totalPages > 1) {
		$self = $href ;

		if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
			$pageNumber = (int)$_GET['page'];
		} else {
			$pageNumber = 1;
		}

		// menampilkan prev dan first dan dihilangkan jika di posisi pertama
		if ($pageNumber > 1) {
			$page = $pageNumber - 1;
			if ($page > 1) {
				$prev = "<li><a class=\"prev\" href=\"$self?page=$page\">Prev</a></li>";
			} else {
				$prev = "<li><a class=\"prev\" href=\"$self\">Prev</a></li>";
			}

			$first = "<li><a class=\"first\" href=\"$self\">First</a></li>";
		} else {
			$prev  = ''; // Posisi awal halaman 1 tidak menampilkan prev
			$first = ''; // dan tidak menampilkan first
		}

		// menampilkan next dan last dan tidak ditampilkan jika diposisi terakhir
		if ($pageNumber < $totalPages) {
			$page = $pageNumber + 1;
			$next = "<li><a class=\"next\" href=\"$self?page=$page\">Next</a></li>";
			$last = "<li><a class=\"last\" href=\"$self?page=$totalPages\">Last</a></li>";
		} else {
			$next = ''; // Jika posisi dihalaman terakhir maka next tidak ditampilkan
			$last = ''; // Last tidak ditampilkan
		}

        if($pageNumber > 4){
            $start = $pageNumber - ($pageNumber % $numLinks);
            $end   = $start + $numLinks - 1;
        } else {
            $start = $pageNumber - ($pageNumber % $numLinks) + 1;
            $end   = $start + $numLinks - 1;
        }

		$end   = min($totalPages, $end);

		$pagingLink = array();
		for($page = $start; $page <= $end; $page++)	{
			if ($page == $pageNumber) {
				$pagingLink[] = "<li class='active'><a> $page </a></li>";   // Pada posisi halaman maka halaman navigasi tidak diberi link
			} else {
				if ($page == 1) {
					$pagingLink[] = "<li><a href=\"$self$strGet\">$page</a></li>";
				} else {
					$pagingLink[] = "<li><a href=\"$self?page=$page\">$page</a></li>";
				}
			}

		}

		$pagingLink = implode(' ', $pagingLink);
        $pageofpage = '<li class="disabled"><span>Page '. $pageof .' of '. $totalPages .'</span></li>';

		// mengembalikan halaman navigasi link
		$pagingLink = '<ul class="pagination">'.$pageofpage . $first . $prev . $pagingLink . $next . $last.'</ul>';
	}

	return $pagingLink;
}