@extends('comments::moderator.layout')

@section('title')
    Manage {{ $board->boardname }}
@stop

@section('content')
    <ol class="breadcrumb">
        <li class="active">
            Quick Links
        </li>
        <li>

            <a class="btn btn-primary" href="#editdetails">
                Edit Details
            </a>
            <a class="btn btn-danger" href="#viewbans">
                View Bans
            </a>
                <a class="btn btn-info" href="#inviteusers">
                    Invite Users
                </a>



            <a class="btn btn-warning" href="#moderatecomments">
                Moderate Comments
            </a>

        </li>
    </ol>
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if(Session::has('updatesuccess'))
        <div class="alert alert-success">{{ Session::get('updatesuccess') }}</div>
    @endif
    <h2 class="page-subheader">
        Edit Details<a class="anchor" name="editdetails">.</a>
    </h2>

    <form style="z-index: 1" action="{{ URL::route('moderator.boards.update', $board->id) }}" method="POST">
        {{ csrf_field() }}

        <input name="_method" type="hidden" value="PUT">

        <div class="form-group">
            {!! Form::label('boardname', 'Board Name', ['class' => 'w-form-label h3 checkboxtext']) !!}
            <dfn data-info="Change your board name it must be 2 - 50 characters and unique.">?</dfn>
            <br>
            {!! Form::text('boardname', $board->boardname, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('boardblurb', 'Board Blurb', ['class' => 'w-form-label h3 checkboxtext']) !!}
            <dfn data-info="A description of your board for all your users. Maximum 250 characters.">?</dfn>
            <br>

            {!! Form::textarea('boardblurb', $board->boardblurb, ['class' => 'h100']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('pincode', 'Board Passkey', ['class' => 'w-form-label h3 checkboxtext']) !!}
            <dfn data-info="The passkey is a way for people to enter the board. It must be 2 - 50 characters and unique.">?</dfn>

            {!! Form::text('pincode', $board->pincode, ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Update Board', ['class' => 'btn btn-success']) !!}
    </form>



            <h2 class="page-subheader" >
                Invite People<a class="anchor" name="inviteusers">.</a>
            </h2>
            <p> Anyone can enter your Bubble Board using the boards passkey (your passkey is <span style="font-weight: bold">{{ $board->pincode }}</span> hint hint nudge nudge).<br><br>

            The passkey can be used on:
    <div class="row">
        <div class="col-sm-4 linktitle">The website(duh)<br><a class="" href="{{ URL::to('/') }}">Bubbleboard.co</a></div>
        <div class="col-sm-4 linktitle">Your boards page:<br><a class="" href="{{ url('/board/' . $board->boardname) }}">Bubbleboard.co/board/{{$board->boardname}}</a></div>
        <div class="col-sm-4 linktitle">{!!   HTML::image('images/appscomingsoon.png','apps coming soon',array('width'=>'150px')) !!}</div>
    </div>
        <div class="col-md-8">
            <h3>Invite via Direct Link</h3>
            <p>A direct link by-passes the need for users to input the passkey.
            </p>

            <form method="post" action="/invites">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="board_id">Your Board:</label>
                    <select id="board_id" class="form-control" name="board_id">

                            <option  value="{{ $board->id }}">{{ $board->boardname }}</option>

                    </select>
                </div>
                <div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
                    <label for="email">Email a {{ $board->boardname }} board invite to<dfn data-info="A simple email is sent to the receiver with the board name and direct link.">?</dfn>:</label>
                    
                    <input id="email" type="text" class="form-control" name="email" placeholder="Email..." value="{{ old('email') }}"/>
                    <p class="help-block">{{ $errors->first('email') }}</p>
                </div>
                <button class="btn btn-success" type="submit">Invite</button>
            </form>
            <h3>Direct Link History<dfn data-info="A record of all your invites & direct links generated.">?</dfn></h3>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Sent at</th>
                    <th class="column-author">Sent To</th>
                    <th class="column-comment">Direct Link</th>
                    <th class="column-comment">Active<dfn data-info="Invites are linked to your pincode, if you change your pincode the link becomes invalid. Keep an eye out as we are looking to include additional functionality">?</dfn></th>
                </tr>
                </thead>
                <tbody>
                @if($board->invites->count())
                    @foreach($board->invites as $invite)
                        <tr>
                            <td>
                                {{ $invite->created_at }}
                            </td>
                            <td>
                                {{ $invite->email }}
                            </td>
                            <td>
                                <a class="" href="{{ url('/board/' . $board->boardname . '?access_key=' . $invite->access_key) }}">
                                   Unique Link
                            </td>
                            <td>@if($invite->pincode == $board->pincode)

                                <a>
                                    Yes
                                </a>@else
                                    <a class="red">No</a>
                                    @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">
                            No invites found.
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
            <form method="post" action="/link">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class="btn btn-success" type="submit">Add link</button>
            </form>
            <h2 class="page-subheader" >
                View Bans<a class="anchor" name="viewbans">.</a>
            </h2>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th class="column-author">IP Address</th>
                    <th class="column-comment">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($board->bans->count())
                    @foreach($board->bans as $ban)
                        <tr>
                            <td>
                                {{ $ban->id }}
                            </td>
                            <td>
                                {{ long2ip($ban->ip_address) }}
                            </td>
                            <td>
                                <a class="btn btn-danger delete-ban-toggle" href="{{ URL::route('moderator.boards.bans.destroy', [$board->id, $ban->id]) }}">
                                    Unban
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">
                            No board bans found.
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
            <h2 class="page-subheader" >
                Advance Comment Moderation<a class="anchor" name="viewbans">.</a>
            </h2>

    <div id="comments" v-show="init" style="display: none;">
        <ul class="status-filter">
            <li class="active">
                <a name="moderatecomments" class="all">
                    All Recent Messages
                </a>
            </li>
        </ul>

        <form v-on="submit: bulkUpdate">
            <input type="hidden" v-model="page" value="{{ $page }}">
            <input type="hidden" v-model="status" value="{{ $status }}">
            <input type="hidden" v-model="pageId" value="{{ $pageId }}">

            <div class="bulk-actions">
                <select v-model="bulkAction" class="form-control">
                    <option value="0">Bulk Actions</option>
                    <option value="delete">Delete Permanently</option>
                </select>
                <button type="submit" class="btn btn-success btn-sm">Apply</button>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="column-check">
                            <input type="checkbox" v-on="click: markAll" v-model="markedAll" title="Mark all comments">
                        </th>
                        <th class="column-author">Author</th>
                        <th class="column-comment">Comment</th>
                        <th class="column-page">In Response To</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-show="pagination.total" v-repeat="comment: comments" v-class="warning: highlighted(comment)">
                        <td>
                            <input type="checkbox" v-model="comment.mark" v-on="click: mark" title="Mark this comment">
                        </td>
                        <td class="column-author">
                            <div>
                                <img v-attr="src: comment.author.avatar">
                                <b>@{{ comment.author.name }}</b>
                                <small>@{{ comment.user_id ? '(user)' : '' }}</small>
                            </div>
                            <div>
                                <a href="mailto:@{{ comment.author.email }}">
                                    @{{ comment.author.email }}
                                </a>
                            </div>
                            <div v-if="comment.author.url">
                                <a href="@{{ comment.author.url }}" target="_blank">
                                    @{{ comment.author.url }}
                                </a>
                            </div>
                            <a href="http://whatismyipaddress.com/ip/@{{ comment.author.ip }}" target="_blank"
                               data-toggle="tooltip" data-original-title="@{{ comment.user_agent }}">
                                @{{ comment.author.ip }}
                            </a>
                        </td>
                        <td class="column-comment">
                            <div class="submitted-on">
                                Submitted
                                <a href="@{{ comment.permalink }}" title="@{{ comment.created_at.timestamp }}">
                                    @{{ comment.created_at.diff }}
                                </a>
                                <template v-if="comment.parent">
                                    in reply to <a href="@{{ comment.parent.permalink }}">@{{ comment.parent.author.name }}</a>
                                </template>
                            </div>

                            <div class="content">
                                @{{ comment.content }}
                            </div>

                            <div class="row-actions">
                                <span v-if="comment.status !== 'trash' && comment.status !== 'spam'">
                                    <a href="#!edit=@{{ comment.id }}" v-on="click: editComment = comment">Edit</a>
                                </span>

                                <span>
                                    | <a href="#" class="delete" v-on="click: destroy(comment, $event)">Delete Permanently</a>
                                </span>

                                <span>
                                    | <a href="#" class="delete ban-user-toggle" data-board-id="{{ $board->id }}" data-user-ip="@{{ comment.author.ip }}">
                                        Ban User
                                    </a>
                                </span>
                            </div>
                        </td>
                        <td>
                            <a href="?page_id=@{{ comment.page_id }}" class="page-com-count">
                                <span class="label label-primary">
                                    @{{ pageCount[comment.page_id] || 0 }}
                                </span>
                            </a>
                            <a href="@{{ comment.permalink }}">View Page</a>
                        </td>
                    </tr>
                    <tr v-if="!pagination.total">
                        <td colspan="4" class="text-center">
                            <div v-show="loading" class="spinner">Loading...</div>
                            <template v-if="!loading">No comments found.</template>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </form>

        <div class="text-center" v-if="pagination.total && pagination.total > pagination.per_page">
            <div class="pull-left">
                <div class="pull-left">@{{ pagination.total }} comment(s)</div>
            </div>
            <div class="pull-right">
                <ul class="pagination pagination-sm">
                    <li v-if="pagination.current_page !== 1">
                        <a href="?page_id={{ $pageId }}&page=@{{ pagination.prev_page }}">&laquo;</a>
                    </li>
                    <li v-if="pagination.current_page === 1" class="disabled">
                        <span>&laquo;</span>
                    </li>
                    <li v-if="pagination.first_adjacent_page > 1">
                        <a href="?page_id={{ $pageId }}&page=1">1</a>
                    </li>
                    <li v-if="pagination.first_adjacent_page > 2" class="disabled"><a>...</a></li>
                    <template v-repeat="pagination.last_adjacent_page">
                        <li v-if="$index + 1 >= pagination.first_adjacent_page" v-class="active: pagination.current_page == $index + 1">
                            <a href="?page_id={{ $pageId }}&page=@{{ $index + 1 }}">@{{ $index + 1 }}</a>
                        </li>
                    </template>
                    <li v-if="pagination.last_adjacent_page < pagination.last_page - 1" class="disabled"><a>...</a></li>
                    <li v-if="pagination.last_adjacent_page < pagination.last_page">
                        <a href="?page_id={{ $pageId }}&page=@{{ pagination.last_page }}">@{{ pagination.last_page }}</a>
                    </li>
                    <li v-if="pagination.current_page < pagination.last_page">
                        <a href="?page_id={{ $pageId }}&page=@{{ pagination.next_page }}">&raquo;</a>
                    </li>
                    <li v-if="pagination.current_page === pagination.last_page" class="disabled">
                        <span>&raquo;</span>
                    </li>
                </ul>
            </div>
        </div>

        <edit-modal comment="@{{ editComment }}" on-close="@{{ onCloseEdit }}" config="@{{ config }}"></edit-modal>
    </div>

    <script type="text/x-template" id="edit-modal-template">@include('comments::admin/partials/edit-modal')</script>
            <br>

    {!!Form::open(['method' =>'DELETE','route'=>['board.destroy',$board->boardname]])!!}


    {!! Form::submit('Permanently Delete Board',['class'=> 'btn btn-danger']) !!}


    {!! Form::close() !!}


    </div>
@stop
