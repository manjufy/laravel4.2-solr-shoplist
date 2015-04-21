@extends('layouts.master')
@section('content')
     <hr/>
<div class="container">
    <div class="row centered-form">
        <div class="col-md-12 col-md-8 col-md-8 col-md-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Search for a Store!
                        <small>Anywhere in Malaysia!</small>
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ URL::to('store/search') }}">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <select type="text" class="form-control multiselect multiselect-icon"
                                            role="multiselect" name="category">
                                        <option value="" data-icon="glyphicon-picture" selected="selected">All
                                            Categories
                                        </option>
                                        <?php
                                        foreach ($facets['category'] as $categoryName => $categoryCount) {
                                            ?>
                                            <option value="<?php echo $categoryName; ?>"
                                                    data-icon="glyphicon-link"><?php echo $categoryName . ' (' . $categoryCount . ')'; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <select type="text" class="form-control multiselect multiselect-icon"
                                            role="multiselect" name="state">
                                        <option value="" data-icon="glyphicon-picture" selected="selected">All
                                            States
                                        </option>
                                        <?php
                                        foreach ($facets['state'] as $stateName => $stateCount) {
                                            ?>
                                            <option value="<?php echo $stateName; ?>"
                                                    data-icon="glyphicon-link"><?php echo $stateName . ' (' . $stateCount . ')'; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <select type="text" class="form-control multiselect multiselect-icon"
                                            role="multiselect" name="town">
                                        <option value="" data-icon="glyphicon-picture" selected="selected">All
                                            Towns
                                        </option>
                                        <?php
                                        foreach ($facets['town'] as $townName => $townCount) {
                                            ?>
                                            <option value="<?php echo $townName; ?>"
                                                    data-icon="glyphicon-link"><?php echo $townName . ' (' . $townCount . ')'; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="shop" id="password_confirmation"
                                           class="form-control input-sm" placeholder="Shop name?">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="keyword" id="email" class="form-control input-sm"
                                   placeholder="What are you looking for?">
                        </div>
                        <input type="hidden" name="search" value="true"/>
                        <input type="submit" value="SEARCH" class="btn btn-info btn-block">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
