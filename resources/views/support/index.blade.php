@extends('layouts.backend')

@section('content')



    <div class="full-chat-w">
        <div class="full-chat-i">
            <div class="full-chat-left">

                <div class="user-list" id="recent_users">


                </div>
            </div>
            <div class="full-chat-middle">
                <div class="chat-head">
                    <div class="user-info"><span>To:</span><a href="#">Support</a></div>
                </div>
                <div class="chat-content-w">
                    <div class="chat-content"  id="chat_content">

                    </div>
                </div>
                <div class="chat-controls">
                    <div class="chat-input">
                        <input placeholder="Type your message here..." id="message" type="text">
                    </div>
                    <div class="chat-input-extra">

                        <div class="chat-btn">

                            <button class="btn btn-primary btn-sm" id="reply">Reply</button>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('js')
    <script>
        var active_user = {{\App\Helpers\Helper::getSupportUserID()}} ;
    </script>
    <script src="{{  asset( '/js/support.js' ) }}"></script>
@endsection