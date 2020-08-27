@extends('layouts.common')

@section('title', 'TOP')
@include('layouts.head')
@include('layouts.header')

@section('content')
<div id="chat">
    <!-- プロフィール -->
    <div class="container">
        <div class="row">
            <template v-for="m in messages">
                <div class="col-12 clearfix">
                    <div class="media mb-2 ">
                        <img class="rounded-circle float-right" style="width:50px; height:50px" :src="icon_image[m.post_user_info_id]">
                        <div class="media-body ml-2 float-left">
                            <div class="card">
                                <div class="card-body">
                                    <span v-text="m.context"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <div class="row">
            <div class="col-12 fixed-bottom">
                <div class="input-group mb-4">
                    <input type="text" v-model="message" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" @click="send()">送信</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageJs')
<script src="/js/chat.js" ></script>
<!-- axios -->
<!-- <script src="https://unpkg.com/axios/dist/axios.min.js" crossorigin="anonymous"></script>    -->
@endsection
@include('layouts.footer')