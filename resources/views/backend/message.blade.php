@extends('layouts.backend')

@section('content')



<div class="full-chat-w">
    <div class="full-chat-i">
        <div class="full-chat-left">

            <div class="user-list">
                <div class="user-w"><!-- Repeat me to create a chat users-->
                    <div class="avatar with-status status-green"><img alt="" src="{{ asset( $avatar ) }}"></div>
                    <div class="user-info">
                        <div class="user-date">12 min</div>
                        <div class="user-name">Support</div>
                        <div class="last-message">What's on your mind?.....</div>
                    </div>
                </div><!-- Repeat me to create a chat-->

            </div>
        </div>
        <div class="full-chat-middle">
            <div class="chat-head">
                <div class="user-info"><span>To:</span><a href="#">Support</a></div>
            </div>
            <div class="chat-content-w">
                <div class="chat-content">
                    <div class="chat-message">
                        <div class="chat-message-content-w">
                            <div class="chat-message-content">This is a support user, Welcome and how can I help you?</div>
                        </div>
                        <div class="chat-message-avatar"><img alt="" src="{{ asset( $avatar ) }}"></div>
                        <div class="chat-message-date">Now</div>
                    </div>
                    <div class="chat-date-separator"><span>Yesterday</span></div>
                    <div class="chat-message self">
                        <div class="chat-message-content-w">
                            <div class="chat-message-content">Hi, my first auto test message.......</div>
                        </div>
                        <div class="chat-message-date">1:23pm</div>
                        <div class="chat-message-avatar"><img alt="" src="{{ asset( $avatar ) }}"></div>
                    </div>
                </div>
            </div>
            <div class="chat-controls">
                <div class="chat-input">
                    <input placeholder="Type your message here..." type="text">
                </div>
                <div class="chat-input-extra">
                    <div class="chat-btn"><a class="btn btn-primary btn-sm" href="#">Reply</a></div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection