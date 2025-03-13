<script>
    // accepting only numeric values for phone input
    $("#phone").on("input", function () {
        $(this).val($(this).val().replace(/\D/g, ""));
    });

    // validating form inputs
    function validateForm() {
        let result = true;
        let messages = [];

        // creating a function to check if any of the inputs are empty
        function isEmpty() {
            let count = 0;

            document.querySelectorAll("input").forEach((elem) => {
                if(elem.value) count++;
                if(!elem.value) setBorder(elem, "red");
            });

            if (count < $("input").length) {
                messages.push("لطفا فیلد ها را پر کنید.");
            }
        }

        // validating first_name and last_name
        function validateName(name) {
            if (!name.value.match(/[آ-ی]/)) {
                messages.push(`لطفا ${name.placeholder.replace("(فارسی)", "")} را به فارسی بنویسید.`);
                setBorder(name, "red")
            } else if (name.value.length < 3) {
                messages.push(`لطفا ${name.placeholder.replace("(فارسی)", "")} معتبر وارد کنید.`);
                setBorder(name, "red");
            } else {
                setBorder(name, "green");
            }
        }

        // seting the input border class
        function setBorder(elem, color) {
            if(color === 'red') {
                $(elem).removeClass("green-border");
                $(elem).addClass("red-border");
            } else {
                $(elem).removeClass("red-border");
                $(elem).addClass("green-border");
            }
        }

        // checking if any of the inputs are empty
        isEmpty();

        let email = $("#email").val();
        if (!String(email).match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/)) {
            setBorder($("#email"), "red");
            messages.push('لطفا ایمیل معتبر وارد کنید.');
        } else {
            setBorder($("#email"), "green");
        }

        let password = $("#password").val();
        if (!String(password).match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,20}$/)) {
            setBorder($("#password"), "red");
            if (!String(password).match(/(?=.[a-z])(?=.[A-Z])/)) {
                messages.push('کلمه عبور باید شامل الفبا انگلیسی بزرگ و کوچک باشد.');
            } else if (!String(password).match(/(?=.*[0-9])/)) {
                messages.push('کلمه عبور باید شامل حداقل یک عدد باشد.');

            } else {
                messages.push('کلمه عبور باید شامل 6 تا 20 حرف باشد.');
            }
        } else {
            setBorder($("#password"), "green")
        }

        let repassword = $("#repassword").val();
        if (password) {
            if (repassword !== password) {
                setBorder($("#repassword"), "red")
                messages.push('کلمه عبور با تکرار آن همخوانی ندارد.');
            }
        } else {
            setBorder($("#repassword"), "green")
        }

        validateName(document.getElementById("first_name"));

        validateName(document.getElementById("last_name"));

        let phone = $("#phone").val();
        if (String(phone).length != 11 || !String(phone).startsWith('09')) {
            setBorder($("#phone"), "red");
            messages.push('لطفا موبایل معتبر وارد کنید.');
        } else {
            setBorder($("#phone"), "red");
        }

        // displaying the alert messages
        $("#messages").html('');
        messages.forEach((message, index) => {
            document.getElementById("messages").innerHTML += `<li>${message}</li>`;
        });

        // returnig the boolean
        $("#messages").hide();
        if (messages.length) {
            $("#messages").slideDown();
            return false;
        }
    }
</script>