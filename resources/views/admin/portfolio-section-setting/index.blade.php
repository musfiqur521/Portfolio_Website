{{-- copy portfolio-item index file --}}


@extends('admin.layouts.app')

@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Portfolio Section Setting</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Portfolio Section Setting</h2>
                <p class="section-lead">You can manage Portfolio Section Setting here.</p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">

                                <div class="col-12">
                                    <a href="{{ route('admin.portfolio-section-setting.create') }}" class="btn btn-primary">Add New</a>
                                </div>

                            </div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Section Title</th>
                                                <th>Section Subtitle</th>
                                                <th>Section Description</th>
                                                <th>Section Image</th>
                                                <th>Section Image Alt</th>
                                                <th>Section Image Title</th>
                                                <th>Section Image Link</th>
                                                <th>Section Image Link Title</th>
                                                <th>Section Image Link Target</th>
                                                <th>Section Image Link Rel</th>
                                                <th>Section Image Link Class</th>
                                                <th>Section Image Link Id</th>
                                                <th>Section Image Link Style</th>
                                                <th>Section Image Link Role</th>
                                                <th>Section Image Link Aria Label</th>
                                                <th>Section Image Link Tab Index</th>
                                                <th>Section Image Link Download</th>
                                                <th>Section Image Link Rev</th>
                                                <th>Section Image Link Shape</th>
                                                <th>Section Image Link Coords</th>
                                                <th>Section Image Link Href Lang</th>
                                                <th>Section Image Link Dir</th>
                                                <th>Section Image Link Lang</th>
                                                <th>Section Image Link Target</th>
                                                <th>Section Image Link Type</th>
                                                <th>Section Image Link Referrerpolicy</th>
                                                

