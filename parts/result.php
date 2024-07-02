<div class="box box-default">
    <div class="box-body" style="padding:20px 0">
        <div class="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="/opac/">Home</a></li>
                <li>Pencarian Sederhana</li>
                <li class="active"></li>
            </ol>
        </div>

        <!-- Modal -->

        <div class="row">
            <div class="col-sm-12">
                <div>
                    <?php
                    $keywords_info = '<span class="search-keyword-info" title="' . htmlentities($keywords) . '">' . ((strlen($keywords) > 30) ? substr($keywords, 0, 30) . '...' : $keywords) . '</span>';
                    $search_result_info = '<div class="search-found-info">';
                    $search_result_info .= __('Found <strong>{biblio_list->num_rows}</strong> from your keywords') . ': <strong class="search-found-info-keywords">' . $keywords_info . '</strong>';
                    $search_result_info .= '</div>';
                    echo str_replace('{biblio_list->num_rows}', $engine->getNumRows(), $search_result_info);
                    ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-9">
                
                <?php
                    if (ENVIRONMENT == 'development' && !empty($engine->getError())) echo '<div class="alert alert-danger mt-2 text-center">' . $engine->getError() . '</div>';
                    // catch empty list
                    if (trim(strip_tags($main_content)) === '') {
                        echo '<div style="display:flex;justify-content:center">
                                <img src="'.CURRENT_TEMPLATE_DIR.'assets/images/empty.svg" />
                              </div>
                              <div class="text-center text-danger"><strong>'.__('No Result').'.</strong> '.__('Please try again').'</div>';
                    } else {
                        echo '<table class="table2 table-striped" width="100%">';
                        echo $main_content;
                        echo '</table>';
                    }
                ?>
                
            </div>
        </div>
    </div>
</div>