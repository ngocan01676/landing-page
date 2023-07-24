    <!-- form -->
    <div class="form" id="link-apec">
        <div class="form-box-img">
            <img class="form-img-1" src="{{ URL::to('/') }}/images/Frame-1.png" alt="" data-aos="fade-down-right" data-aos-duration="1000">
            <img class="form-img-2" src="{{ URL::to('/') }}/images/Frame-2.png" alt="" data-aos="fade-down" data-aos-duration="1000">
        </div>
        <div class="form-box-img">
            <img class="form-img-3" src="{{ URL::to('/') }}/images/Frame-3.png" alt="" data-aos="fade-up-right" data-aos-duration="1000">
            <img class="form-img-4" src="{{ URL::to('/') }}/images/Frame-4.png" alt="" data-aos="fade-up" data-aos-duration="1000">
        </div>
        <div class="form-container">
            <h3 class="form-text-item" data-aos="zoom-in" data-aos-duration="1000">{{$title}}</h3>
            <h4 class="form-header" data-aos="zoom-in" data-aos-duration="1000">{{$sub_title}}</h4>
            <div class="wrapper-form-box">
                <div class="form-box" data-aos="zoom-in" data-aos-duration="1500">
                    <div class="form-box-list">
                        <form action="{{route('contact.sendMessage')}}" method="post" class="hr-contact-form" enctype="multipart/form-data">
                            <div class="form-list-input">
                                <input type="text" name="fullName" placeholder="Họ & tên *" required>
                                <input class = "VTUT" type="text" name="applyPosition" placeholder="Vị trí ứng tuyển *" required>
                            </div>
                            <div class="form-list-input list-input">
                                <div class="form-input-search numberPhone">
                                    <input type="tel" name="phone" placeholder="Số điện thoại *" required>
                                </div>
                                <div class="form-input-search email">
                                    <input type="email" name="email" placeholder="Email *" required>
                                </div>
                                <div class="form-input-file hr-file">
                                <div class="file-upload">
                                <div class="file-select">
                                    <div class="file-select-button" id="fileName">
                                    </div>
                                    <div class="file-select-name text-truncate" id="noFile">Đính kèm CV</div> 
                                    <input type="file" name="file" id="chooseFile">
                                    <div class="form-file-icon">
                                        <i class="fas fa-paperclip"></i>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </div>
                            <div class="form-textarea">
                                <textarea name="message" cols="30" rows="10" placeholder="Thư ứng tuyển"></textarea>
                            </div>
                            <div class="form-btn">
                                <button class="form-btn-button" type="submit">
                                    {{$btn_text}}
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                            <div class="ht-result-text mt-3 text-center hidden">Cảm ơn bạn đã gửi thông tin.Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>