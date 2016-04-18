@extends('layouts.app')
 
@section('content')
 
<div class="container" ng-app="eventApp" ng-controller="eventController">
        <div class="row">
            <div class="col-md-6">
                <h2><% currentTitle %></h2>
            </div>
            <div class="col-md-6">
				<a href="/events/create" class="btn btn-primary">Create event</a>
            </div>
</div>

<br>

<div class="row">
            <ul class="nav nav-tabs">
                <li role="events" ng-repeat="tab in tabs" ng-class="{active:isActiveTab(tab.type)}" ng-click="onClickTab(tab)">
                    <a href="#">
                        <% tab.title %>
                    </a>
                </li>
            </ul>
            <br/>
            <div ng-hide="loading" ng-repeat="event in events">
                <!-- Event panel -->
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center"><strong><% event.title %></strong> - hosted by <% event.creator.first_name %></div>
                        <div class="panel-body">
                            <div class="form-group clearfix">
                                <!-- Occupancy -->
                                <label class="col-md-4">Occupancy</label>
                                <div class="col-md-8"><% event.bookings.length %> / <% event.capacity == 0 ? 'unlimited': event.capacity %></div>
                            </div>
                            <!-- Start time -->
                            <div class="form-group clearfix">
                                <label class="col-md-4">Start time</label>
                                <div class="col-md-8"><% event.start_time_friendly %></div>
                            </div>
                            <!-- End time -->
                            <div class="form-group">
                                <label class="col-md-4">End time</label>
                                <div class="col-md-8"><% event.end_time_friendly %></div>
                            </div>
                            <!-- Buttons -->
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <!-- Show event details -->
                                    <a class="btn btn-primary" align="center" href="/events/show/<% event.id %>">View details</a>
                                    <!-- Delete event -->
                                    <a ng-show="<% isActiveTab(eventsType.hosted) %>" class="btn btn-danger" href="#" ng-click="deleteEvent(event.id)" class="text-muted">Delete</a>
                                    <!-- Unbook event -->
                                    <a ng-show="<% isActiveTab(eventsType.booked) %>" class="btn btn-warning" href="#" ng-click="unbookEvent(event.id)" class="text-muted">Unbook</a>
                                    <!-- Book event -->
                                    <a ng-show="<% isActiveTab(eventsType.upcoming) %>" class="btn btn-success" href="#" ng-click="bookEvent(event.id)" class="text-muted">Book!</a>
                                    <!-- Book event -->
                                    <a ng-show="<% isActiveTab(eventsType.hosted) %>" class="btn btn-success" href="/events/<% event.id %>/bookings" class="text-muted">View bookings</a>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@section('view.scripts')
<script type="text/javascript">                             
    $(function () {
    });
</script>
@endsection 
@endsection