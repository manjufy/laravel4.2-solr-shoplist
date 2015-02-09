@extends('layouts.master')
@section('content')
    <h4>Browse through the Stores</h4>
    <!-- Example row of columns -->
<?php
    $currentURL = Request::url();
    $queryString = $currentURL.'?';

    if (Input::get('category'))
    {
        $queryString .= 'category='.Input::get('category').'&';
    }

    if (Input::get('state'))
    {
        $queryString .= 'state='.Input::get('state').'&';
    }

    if (Input::get('town'))
    {
        $queryString .= 'town='.Input::get('town').'&';
    }
?>

<div class="row">
    <div class="col-md-3">
        <p>
            <?php
                echo "<ul class=\"list-group\" style=\"list-style: none;\"> ";
                foreach ($facets as $facetKey => $facetValues) {
                    $categoryName = ucfirst($facetKey);

                    if ($categoryName === 'Category') {
                        echo "<b><li class=\"list-group-item\">$categoryName</li></b>";
                        echo "<ul class=\"list-group\" style=\"list-style: none;\">";
                        foreach ($facetValues as $name => $count) {
                                $category = $name;

                            if (Input::get('category') != '') {
                                echo "<a href='$queryString'><li class=\"list-group-item\">" . ' <span class="badge">' . $count . '</span>' . $name . "</li></a>";
                            } else {
                               echo "<a href='".$queryString."category=$category'><li class=\"list-group-item\">" . ' <span class="badge">' . $count . '</span>' . $name . "</li></a>";
                            }
                        }
                    }

                    echo "</ul>";
                }
                echo "</ul>";
                ?>

                <?php
                echo "<ul class=\"list-group\" style=\"list-style: none;\"> ";
                foreach ($facets as $facetKey => $facetValues) {
                    $categoryName = ucfirst($facetKey);

                    if ($categoryName === 'State') {
                        echo "<b><li class=\"list-group-item\">$categoryName</li></b>";
                        echo "<ul class=\"list-group\" style=\"list-style: none;\">";
                        foreach ($facetValues as $name => $count) {
                                $state = $name;
                            if (Input::get('state') != '') {
                                echo "<a href='$queryString'><li class=\"list-group-item\">" . ' <span class="badge">' . $count . '</span>' . $name . "</li></a>";
                            } else {
                                 echo "<a href='".$queryString."state=$state'><li class=\"list-group-item\">" . ' <span class="badge">' . $count . '</span>' . $name . "</li></a>";
                            }
                        }
                    }

                    echo "</ul>";
                }
                echo "</ul>";
                ?>
                <?php
                echo "<ul class=\"list-group\" style=\"list-style: none;\"> ";
                foreach ($facets as $facetKey => $facetValues) {
                    $categoryName = ucfirst($facetKey);

                    if ($categoryName === 'Town') {
                        echo "<b><li class=\"list-group-item\">$categoryName</li></b>";
                        echo "<ul class=\"list-group\" style=\"list-style: none;\">";
                        foreach ($facetValues as $name => $count) {
                            $town = $name;
                            if (Input::get('town') != '') {
                                echo "<a href='$queryString'><li class=\"list-group-item\">" . ' <span class="badge">' . $count . '</span>' . $name . "</li></a>";
                            } else {
                               echo "<a href='".$queryString."town=" . $town . "'><li class=\"list-group-item\">" . ' <span class="badge">' . $count . '</span>' . $name . "</li></a>";
                            }
                        }
                    }

                    echo "</ul>";
                }
                echo "</ul>";
            ?>
        </p>
    </div>
    <div class="col-md-9">
       <?php
           foreach ($results as $list) {
               ?>
               <div class="row  top-buffer">
                   <div class="col-md-2">
                       <img src="http://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg" width="100"
                            height="100">
                   </div>
                   <div class="col-md-10">
                       <div class="row">
                           <div class="col-md-9">
                               <b><a href=""><?php echo $list['name']; ?></a></b>
                               <p>
                                   <b>Category : </b><?php echo $list['category']; ?>
                               </p>
                               <p>
                                   <?php echo $list['description']; ?>
                               </p>
                           </div>
                           <div class="col-md-3">
                               <b>
                                   <?php echo $list['town']; ?>,<br/>
                                   <?php echo $list['state']; ?>
                               </b>
                           </div>
                       </div>
                       <div class="row">
                           <div class="pull-right">
                               <button type="button" class="btn btn-primary btn-sm">VIEW</button>
                           </div>
                       </div>
                   </div>
               </div>
               <hr/>
           <?php
           }
           ?>
           {{ $pagination; }}
    </div>
</div>
@stop
