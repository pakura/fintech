$(function () {
    // Fix sidebar toggle when it has fixed position
    $('a[data-toggle="sidebar"]').on('click', function (e) {
        e.preventDefault();

        var expanded = $('#main-menu').find('.expanded');
        if (expanded.length) {
            if (public_vars.$sidebarMenu.hasClass('collapsed')) {
                $('> ul', expanded).css('display', 'block');
            } else {
                $('> ul', expanded).css('display', '');
            }
        }
    });

    // Toggle page action buttons
    var items = $('#items');
    items.on('click', '.btn-toggle', function (e) {
        e.preventDefault();

        if (! $(this).hasClass('active')) {
            $('.btn-action', items).hide();
            $('.btn-toggle', items).removeClass('active');
        }

        $(this).siblings('.btn-action').toggle(300);
        $(this).addClass('active');
    });

    // Make form closable on "#submit-close" click
    $('#submit-close').on('click', function () {
        $('input.form-close').val(1);
    });

    // Disable buttons on submit for some period of time
    $(document).on('submit', 'form', function () {
        $('input[type="submit"], button[type="submit"]', this).prop('disabled', true);

        setTimeout(function (form) {
            $('input[type="submit"], button[type="submit"]', form).prop('disabled', false);
        }, 800, this);
    });

    // Delete form
    $(document).on('submit', '.form-delete', function (e) {
        e.preventDefault();
        if (! confirm('Are you sure you want to delete?')) {
            return;
        }
        var form = $(this);
        var btn = form.find('[type="submit"]').prop('disabled', true);

        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            dataType: 'json',
            data: form.serialize(),
            success: function (data) {
                form.trigger('deleteFormSuccess', [data]);

                if (data) {
                    // toastr alert message
                    if (typeof toastr === 'object') {
                        toastr[data.result](data.message);
                    }
                    // delete action
                    if (data.result === 'success') {
                        form.closest('.item').fadeOut(600, function () {
                            if ($(this).data('parent') === 1) {
                                $(this).closest('.uk-parent').removeClass('uk-parent');
                                disableParentDeletion();
                            }

                            $(this).remove();
                        });
                    }
                }
            },
            error: function (xhr) {
                alert(xhr.responseText);
            },
            complete: function () {
                btn.prop('disabled', false);
            }
        });
    });

    // Ajax form submit
    var ajaxFormSelector = 'form.ajax-form';
    $(document).on('submit', ajaxFormSelector, function (e) {
        e.preventDefault();
        var form = $(this);
        form.find('.text-danger').remove();
        var lang = form.data('lang');
        lang = lang ? lang : '';

        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            dataType: 'json',
            data: form.serialize(),
            success: function (data) {
                form.trigger('ajaxFormSuccess', [data]);

                // toastr alert message
                if (typeof toastr === 'object') {
                    toastr[data.result](data.message);
                }
                // fill form inputs
                if (data.input && typeof data.input === 'object') {
                    $.each(data.input, function (index, element) {
                        var item = $('#' + index + lang, form);

                        if (item.data('lang')) {
                            var type = (typeof element === 'object') ? '[]' : '';
                            var inputGeneral = $(ajaxFormSelector + ' [name="' + index + type + '"]');
                            $(inputGeneral).each(function (i, e) {
                                item = $(e);
                                if (item.val() !== element) {
                                    item.val(element);
                                    if (item.is(':checkbox')) {
                                        var bool = element === 1;
                                        item.prop('checked', bool);
                                    }
                                    if (item.is('select')) {
                                        item.trigger('change');
                                    }
                                }
                            });
                        } else if (item.val() !== element) {
                            item.val(element);
                        }
                    });
                }

                $('.form-group', form).removeClass('validate-has-error');
            },
            error: function (xhr) {
                if (xhr.responseJSON !== undefined) {
                    $.each(xhr.responseJSON, function (index, element) {
                        var field;
                        var arrayField = index.substr(0, index.indexOf('.'));
                        if (arrayField) {
                            field = $('.' + arrayField + lang, form).first();
                        } else {
                            field = $('#' + index + lang, form);
                        }
                        field.closest('.form-group').addClass('validate-has-error');

                        var errorMsg = '<div class="text-danger">'+element+'</div>';
                        if (! field.parent().hasClass('input-group')) {
                            field.after(errorMsg);
                        } else {
                            field.parent().after(errorMsg);
                        }
                    });

                    var errorField = form.find('.validate-has-error').first();
                    if (errorField) {
                        var errorOffset = errorField.offset();
                        if (errorOffset) {
                            $('html, body').animate({
                                scrollTop: errorField.offset().top - 100
                            }, 400);
                        }
                    }
                } else {
                    alert(xhr.responseText);
                }
            },
            complete: function () {
                form.trigger('ajaxFormComplete');
            }
        });
    });

    // Visibility request
    $('form.visibility').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);

        $.post(form.attr('action'), form.serialize(), function (data) {
            var icon, removeClass, addClass;
            if (data) {
                icon = 'fa fa-eye';
                removeClass = 'btn-gray';
                addClass = 'btn-white';
            } else {
                icon = 'fa fa-eye-slash';
                removeClass = 'btn-white';
                addClass = 'btn-gray';
            }
            form.removeClass(removeClass)
                .addClass(addClass)
                .find('span')
                .attr('class', icon);
        }, 'json').fail(function (xhr) {
            alert(xhr.responseText);
        });
    });
});

// Lockscreen event handlers and functions
var timer;
var timerIsActive = true;

$('form#set-lockscreen').on('submit', function (e) {
    e.preventDefault();

    clearTimeout(timer);
    timerIsActive = false;

    setLockscreen($(this));
});

function setLockscreen(form) {
    $.post(form.attr('action'), form.serialize(), function (data) {
        if (data) {
            var body = $('body');
            body.append(data.view);
            body.addClass('lockscreen-page');
        }
    }, 'json').fail(function (xhr) {
        alert(xhr.responseText);
    });
}

function lockscreen(time, form, reActive) {
    if (reActive) {
        timerIsActive = true;
    }

    $(document).on('click mousemove keypress scroll', function () {
        if (timerIsActive) {
            clearTimeout(timer);

            timer = setTimeout(function () {
                setLockscreen(form);

                timerIsActive = false;
            }, time);
        }
    });

    $(document).trigger('mousemove');
}
// Lockscreen end

// Update url recursively
function updateUrl(target, url) {
    var prevUrl = url;

    target.each(function () {
        var item = $(this).find('a.link');

        url = prevUrl + '/' + item.data('slug');

        item.attr('href', url);

        if ($(this).hasClass('uk-parent')) {
            updateUrl($('> ul', this).children('li'), url);
        }
    });
}

function disableParentDeletion() {
    var nestable = $('#nestable-list');
    $('.form-delete [type="submit"]', nestable).prop('disabled', false);

    $('.uk-parent', nestable).each(function () {
        $('.form-delete [type="submit"]', this).first().prop('disabled', true);
    });
}

function positionable(url, orderBy, page, hasMorePages) {
    var saveBtn = $('#save-tree');
    var saveBtnIcon = $('.icon-var', saveBtn);
    var postHiddens = {'_method':'put', '_token':saveBtn.data('token')};
    var nestable = $('#nestable-list');
    page = parseInt(page);

    if (page) {
        var aTagStart = '<a href="#" class="move btn btn-gray fa-long-arrow-';
        var aTagNext = 'right right" data-move="next" title="Move to next page"';
        var aTagPrev = 'left left" data-move="prev" title="Move to prev page"';
        var aTagEnd = '></a>';

        if (hasMorePages) {
            $('.btn-action', nestable).prepend(aTagStart + aTagNext + aTagEnd);
        }
        if (page > 1) {
            $('.btn-action', nestable).prepend(aTagStart + aTagPrev + aTagEnd);
        }
    }

    nestable.on('nestable-stop', function () {
        $('.move', nestable).remove();
        saveBtn.show().prop('disabled', false);
        saveBtnIcon.removeClass('fa-spin fa-check').addClass('fa-save');
    });

    // Position move
    nestable.on('click',  'a.move', function (e) {
        e.preventDefault();
        var move = $(this).data('move');
        var item = $(this).closest('li');
        var input = [{'id':item.data('id'), 'pos':item.data('pos')}];
        var items;

        if (move === 'next') {
            items = item.nextAll();
        } else {
            items = item.prevAll();
        }

        items.each(function (i, e) {
            input.push({'id':$(e).data('id'), 'pos':$(e).data('pos')});
        });

        input = $.extend({'data':input, 'move':move, 'orderBy':orderBy}, postHiddens);

        $.post(url, input, function () {
            page = move === 'next' ? page + 1 : page - 1;
            var href = window.location.href;
            var hrefQueryStart = href.indexOf('?');
            if (hrefQueryStart > 1) {
                href = href.substr(0, hrefQueryStart);
            }
            window.location.href = href + '?page=' + page;
        }, 'json').fail(function (xhr) {
            alert(xhr.responseText);
        });
    });

    // Position save
    saveBtn.on('click', function () {
        $(this).prop('disabled', true);
        saveBtnIcon.addClass('fa-spin');
        var nestable = $('#nestable-list');

        if (page) {
            $('.move', nestable).remove();
            if (hasMorePages) {
                $('btn-action', nestable).prepend(aTagStart + aTagNext + aTagEnd);
            }
            if (page > 1) {
                $('btn-action', nestable).prepend(aTagStart + aTagPrev + aTagEnd);
            }
        }

        var input = nestable.data('nestable').serialize();

        if (orderBy) {
            var posArr = [];
            $(input).each(function (i, e) {
                posArr[i] = e.pos;
            });
            if (orderBy === 'desc') {
                posArr.sort(function (a, b) {return b-a});
            } else {
                posArr.sort(function (a, b) {return a-b});
            }
            $(posArr).each(function (i, e) {
                input[i].pos = e;
            });
        }

        input = {'data':input};
        input = $.extend(input, postHiddens);

        $.post(url, input, function () {
            saveBtnIcon.removeClass('fa-spin fa-save').addClass('fa-check');

            if (orderBy) {
                $(input.data).each(function (i, e) {
                    $('item'+e.id, nestable).data('pos', e.pos);
                });
            }

            saveBtn.trigger('positionSaved');

            disableParentDeletion();
        }, 'json').fail(function (xhr) {
            saveBtnIcon.removeClass('fa-spin fa-save').addClass('fa-remove');

            alert(xhr.responseText);
        }).always(function () {
            saveBtn.delay(400).fadeOut(500);
        });
    });
}
