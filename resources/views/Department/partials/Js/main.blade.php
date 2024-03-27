<script>
    $(document).ready(function() {
        $.fn.extend({
            treed: function(o) {
                var openedClass = 'uil-minus-square';
                var closedClass = 'uil-plus-square';

                if (typeof o != 'undefined') {
                    if (typeof o.openedClass != 'undefined') {
                        openedClass = o.openedClass;
                    }
                    if (typeof o.closedClass != 'undefined') {
                        closedClass = o.closedClass;
                    }
                };

                var tree = $(this);
                tree.addClass("tree");

                tree.find('li').has("ul").each(function() {
                    var branch = $(this);
                    console.log('branch', branch);
                    branch.prepend("<i class='indicator " + closedClass + "'></i>");
                    branch.addClass('branch');
                    branch.on('click', function(e) {
                        if (this == e.target) {
                            var icon = $(this).children('i');
                            var a = $(this).children('a');
                            icon.toggleClass(openedClass + " " + closedClass);
                            a.toggleClass('active')
                            $(this).children().children().toggle();

                            // Lưu thẻ <a> vào mảng và lưu mảng vào localStorage khi branch được click
                            if (a.length > 0) {
                                var linkId = a.attr('id');
                                var savedLinks = JSON.parse(localStorage.getItem(
                                    'savedLinks')) || [];

                                // Kiểm tra xem id đã tồn tại trong mảng hay chưa
                                var index = savedLinks.indexOf(linkId);
                                if (a.hasClass('active')) {
                                    // Nếu thẻ <a> đã được chọn và chưa tồn tại, thêm vào mảng
                                    if (index === -1) {
                                        savedLinks.push(linkId);
                                    }
                                } else {
                                    // Nếu thẻ <a> đã bị hủy chọn và tồn tại, loại bỏ khỏi mảng
                                    if (index !== -1) {
                                        savedLinks.splice(index, 1);
                                    }
                                }

                                // Lưu mảng vào localStorage
                                localStorage.setItem('savedLinks', JSON.stringify(
                                    savedLinks));
                            }
                        }
                    });

                    branch.children().children().toggle();
                });

                tree.find('li:not(.branch)').css('margin-left', '2rem');

                tree.find('.branch .indicator').each(function() {
                    $(this).on('click', function() {
                        $(this).closest('li').click();
                    });
                });
            }
        });

        // Gọi treed() cho các cây của bạn
        $('#tree1').treed();

        // Chọn thẻ <a> lưu trữ từ localStorage
        var savedLinks = JSON.parse(localStorage.getItem('savedLinks')) || [];
        savedLinks.forEach(function(linkId) {
            $('#' + linkId).addClass('active');
            var parentLi = $('#' + linkId).closest('li');
            var icon = parentLi.children('i');
            icon.attr('class', 'indicator uil-minus-square')
            parentLi.children().children().toggle()
        });
    });
</script>
