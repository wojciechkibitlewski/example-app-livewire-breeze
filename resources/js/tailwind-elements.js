// Initialization for ES Users

import {
  Stepper,
    Sidenav,
    Select,
    Dropdown,
    Input,
    Timepicker,
    Tab,
    Modal,
    Ripple,
    initTE,
} from "tw-elements";

initTE({ Dropdown, Sidenav, Stepper, Select, Input, Timepicker, Tab, Modal, Ripple });

///////////
const picker = document.querySelector("#time");
const tpFormat24 = new Timepicker(picker, { format24: true, });