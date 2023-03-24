/* General Script */
class K_FORM {

    // Here We Put Our Validations Cases For Each HTML Input On data-validation and
    // add cases patterns and hint messages on form_validation_cases Arry

    constructor(formId) {
        this.form_id = formId;
        this.form_status = 1; // For Valid Form And 0 For Invalid Form
        this.form_validation_cases = {
            'min-8': {
                pattern: /^.{8,}$/,
                hint: 'هذا المدخل يجب الا يقل عن 8 حروف'
            },
            'min-4': {
                pattern: /^.{4,}$/,
                hint: 'هذا المدخل يجب الا يقل عن 4 حروف'
            },
            'num-min-8': {
                pattern: /^.{8,}$/,
                hint: 'هذا المدخل يجب الا يقل عن 8 أرقام'
            },
            'num-min-4': {
                pattern: /^.{4,}$/,
                hint: 'هذا المدخل يجب الا يقل عن 4 أرقام'
            },
            'req': {
                pattern: /^.{1,}$/,
                hint: 'هذا المدخل مطلوب'
            },
            'more-eq-0': {
                pattern: /^[0-9][0-9]*$/,
                hint: 'هذا المدخل يجب ان يكون أكبر من او يساوي الصفر'
            },
            'more-0': {
                pattern: /^[1-9][0-9]*$/,
                hint: 'هذا المدخل يجب ان يكون أكبر من الصفر'
            },
            'email': {
                pattern: /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/,
                hint: `يجب أن يكون البريد الإلكترني صحيح`
            }

        }
        this.request_body = 'JSON';
    }

    displayInputValidationHint(inputElement, type, message) {
        if (inputElement.parentNode.lastChild.previousSibling.nodeName === 'SPAN') {
            inputElement.parentNode.removeChild(inputElement.parentNode.lastElementChild);
        }
        let validMessage = document.createElement('span');
        validMessage.textContent = message;
        inputElement.style.border = (type == 'correct') ? '2px solid green' : '2px solid red';
        validMessage.style.width = '100%';
        validMessage.style.fontSize = '18px';
        validMessage.style.marginLeft = '10px';
        validMessage.style.color = (type == 'correct') ? 'green' : 'red';
        inputElement.parentNode.insertBefore(validMessage, inputElement.parentNode.lastChild)
    }

    hideInputsValidationHint() {
        let validationHintMessages = document.querySelectorAll('.k-form-input + span');
        let formInputs = document.getElementById(this.form_id).getElementsByClassName('k-form-input');
        formInputs.forEach(element => {
            element.style.border = 'none';
        })
        validationHintMessages.forEach(element => {
            element.parentNode.removeChild(element);
        })
    }

    validateForm() {
        let formInputs = document.getElementById(this.form_id).getElementsByClassName('k-form-input');
        this.form_status = 1;
        for (let i = 0; i < formInputs.length; i++) {
            let formInput = formInputs[i];
            if (formInput.dataset.validation.length == 0) continue;
            let validationConditions = formInput.dataset.validation.split(' ');
            for (let i = 0; i < validationConditions.length; i++) {
                if (!new RegExp(this.form_validation_cases[validationConditions[i]].pattern).test(formInput.value)) {
                    this.displayInputValidationHint(formInput, 'wrong', this.form_validation_cases[validationConditions[i]].hint);
                    this.form_status = 0;
                    break;
                }
                else {
                    this.displayInputValidationHint(formInput, 'correct', `مدخل صحيح`);
                }
            }
            if (formInput.type == 'file')
                this.request_body = 'FORM-DATA';
        }
        return this.form_status;
    }

    createRequestBody() {
        let body;
        let formInputs = [];
        if (!document.getElementById(this.form_id)) {
            return {};
        }
        else {
            formInputs = document.getElementById(this.form_id).getElementsByTagName('input');
        }
        if (this.request_body == 'JSON') {
            body = {}
            for (let i = 0; i < formInputs.length; i++) {
                let formInput = formInputs[i];
                body[formInput.id] = formInput.value;
            }
        }
        else {
            body = new FormData();
            for (let i = 0; i < formInputs.length; i++) {
                let formInput = formInputs[i];
                if (formInput.type == 'file') {
                    for (let j = 0; j < formInput.files.length; j++) {
                        body.append(`${formInput.id}[]`, formInput.files[j]);
                    }
                }
                else {
                    body.append(`${formInput.id}`, formInput.value);
                }
            }
        }
        return body;
    }

    setUrl(url) {
        document.getElementById(this.form_id).action = url;
    }

    formSubmit() {
        document.getElementById(this.form_id).submit();
    }

}
// Function To get page name
function getPageName() {
    return document.querySelector('.page-content').id;
}
// Handle File Upload Layout Click
if (document.querySelectorAll('.uploadFileLayout').length) {
    let items = document.querySelectorAll('.uploadFileLayout');
    for (let i = 0; i < items.length; i++) {
        items[i].addEventListener('click', (e) => {
            e.preventDefault();
            items[i].parentElement.firstElementChild.nextElementSibling.addEventListener('change', () => {
                items[i].parentElement.firstElementChild.lastElementChild.textContent = items[i].parentElement.firstElementChild.nextElementSibling.value;
            })
            items[i].parentElement.firstElementChild.nextElementSibling.click();
        })
    }
}
// Handle date picker Layout Click
if (document.querySelectorAll('.pickDateLayout').length) {
    let items = document.querySelectorAll('.pickDateLayout');
    for (let i = 0; i < items.length; i++) {
        items[i].addEventListener('click', (e) => {
            e.preventDefault();
            items[i].parentElement.firstElementChild.nextElementSibling.addEventListener('change', () => {
                items[i].parentElement.firstElementChild.firstElementChild.textContent = items[i].parentElement.firstElementChild.nextElementSibling.value;
            })
            items[i].parentElement.firstElementChild.nextElementSibling.showPicker();
        })
    }
}


if (getPageName() == 'coupons-add-edit') {
    // Function to select coupons product filter
    $('.coupons-products  .coupons-products-select').click(function () {
        let index = $('.coupons-products-select').index($(this));
        if (!index) {
            $('.products-search-container').addClass('d-none');
        }
        else {
            $('.products-search-container').addClass('d-none');
            $('.products-search-container').eq(index - 1).removeClass('d-none');
        }
        //$('.selected-products').empty();
    })
    // function to delete product item
    $('.selected-product .bx-trash').click(function () {
        $(this).parent().parent().remove();
    });

}
else if (getPageName() == 'op-plans-add-pack') {
    $('.nextStepBtn').click(function () {
        let index = $('.nextStepBtn').index($(this));
        $('.steps-navs .nav-item .nav-link').removeClass('active').eq(index + 1).addClass('active');
        $('.steps-navs-tabs .tab-pane').removeClass('active').eq(index + 1).addClass('active');
    });
    $('.backStepBtn').click(function () {
        let index = $('.backStepBtn').index($(this));
        $('.steps-navs .nav-item .nav-link').removeClass('active').eq(index).addClass('active');
        $('.steps-navs-tabs .tab-pane').removeClass('active').eq(index).addClass('active');
    });
}
else if (getPageName() == 'add-meal') {
    $('.nextStepBtn').click(function () {
        let index = $('.nextStepBtn').index($(this));
        $('.steps-navs .nav-item .nav-link').removeClass('active').eq(index + 1).addClass('active');
        $('.steps-navs-tabs .tab-pane').removeClass('active').eq(index + 1).addClass('active');
    });
    $('.backStepBtn').click(function () {
        let index = $('.backStepBtn').index($(this));
        $('.steps-navs .nav-item .nav-link').removeClass('active').eq(index).addClass('active');
        $('.steps-navs-tabs .tab-pane').removeClass('active').eq(index).addClass('active');
    });
}

else if (getPageName() == 'e-clinic') {
    // Function To Add New area
    $('#addNewOption').click(function () {
        $('.options-items-container').append(`
            <div class="col-12 row option-item my-2 align-items-end">
                <div class="col-10">

                    <label class="form-label">خيار أخر</label>
                    <input name="choices[]" class="form-control" placeholder="خيار أخر">
                </div>
                <div class="col-2">
                    <i class="bx bx-trash text-danger font-size-24 p-2 bg-white"></i>
                </div>
            </div>`);
        // Function To Delete Added area
        $('.option-item .bx-trash').off('click').click(function () {
            $(this).parent().parent().remove();
        })
    })

}



function confirmation() {
    return confirm(CONFIRMATION_MSG)
}

$(document).on('click', '.confirmActionItem', function () {
    const Self = $(this);
    event.preventDefault();
    if(confirmation() === true) {
        $('#action-form').prop('action', Self.data('url')).submit();
    }
})
