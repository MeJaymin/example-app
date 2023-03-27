{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-question"></i> Users</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-question"></i> Roles</a></li>
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('user-role') }}"><i class="nav-icon la la-question"></i> User Roles</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('pet-type') }}"><i class="nav-icon la la-question"></i> Pet Type</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('pet-breed') }}"><i class="nav-icon la la-question"></i> Pet Breed</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('facility') }}"><i class="nav-icon la la-question"></i> Facility</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('room') }}"><i class="nav-icon la la-question"></i> Room</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('location') }}"><i class="nav-icon la la-question"></i> Location</a>
</li>
