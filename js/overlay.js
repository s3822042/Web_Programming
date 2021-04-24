const overlay = document.getElementById("overlay")
const HuyDuong_content = document.getElementById("HuyDuong")
const Andrew_content = document.getElementById("Andrew")
const MinhNguyen_content = document.getElementById("Minh")
const LuanVo_content = document.getElementById("LuanVo")


function on() {
    overlay.classList.add("overlay-active");
}

function off() {
    overlay.classList.remove("overlay-active");
}

function openmodal(member) {
    switch (member) {
        case "LuanVo":
            LuanVo_content.classList.add("modal-active")
            on()
            break
        case "HuyDuong":
            HuyDuong_content.classList.add("modal-active")
            on()
            break
        case "Andrew":
            Andrew_content.classList.add("modal-active")
            on()
            break
        case "MinhNguyen":
            MinhNguyen_content.classList.add("modal-active")
            on()
            break
    }
}

function offmodal(member) {
    switch (member) {
        case "LuanVo":
            LuanVo_content.classList.remove("modal-active")
            off()
            break
        case "HuyDuong":
            HuyDuong_content.classList.remove("modal-active")
            off()
            break
        case "Andrew":
            Andrew_content.classList.remove("modal-active")
            off()
            break
        case "MinhNguyen":
            MinhNguyen_content.classList.remove("modal-active")
            off()
            break
    }


}

function overlay_turnoff() {
    off()
    if (MinhNguyen_content.classList.contains('modal-active')) {
        MinhNguyen_content.classList.remove('modal-active')
    } else if (LuanVo_content.classList.contains('modal-active')) {
        LuanVo_content.classList.remove('modal-active')
    } else if (Andrew_content.classList.contains('modal-active')) {
        Andrew_content.classList.remove('modal-active')
    } else if (HuyDuong_content.classList.contains('modal-active')) {
        HuyDuong_content.classList.remove('modal-active')
    }
}
overlay.addEventListener('click', overlay_turnoff)