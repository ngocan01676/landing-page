<form action="{{route('blogs.clientComment')}}" method="post" class="ravi-client-comment-form">
    @csrf
    <input type="hidden" name="blog_id" value="{{ $row->id }}" />
    <div class="info-form-comment">
        <div class="form-comment-top">
            <div class="fullname">
                    <p>HỌ TÊN</p>
                    <input name="name"  type="text" placeholder="Họ tên">
            </div>
            <div class="email">
                    <p>EMAIL</p>
                    <input name="email" type="email" placeholder="Email của bạn">
            </div>
        </div>
        <div class="my-comment">
            <p>BÌNH LUẬN CỦA BẠN</p>
            <textarea name="comment" placeholder="Nội dung"></textarea>
        </div>
        <div class="button-comment">
            <button type="submit">BÌNH LUẬN</button>
        </div>
    </div>
</form>