/*
This has been updated to use the new userData method available in formRender
*/
const getUserDataBtn = document.getElementById("get-user-data");
const fbRender = document.getElementById("fb-render");
const originalFormData = [
  {
    type: "text",
    label: "Text Field",
    className: "form-control",
    name: "text-1478701075825",
    userData: ["user entered data"]
  },
  {
    type: "checkbox-group",
    label: "Checkbox Group",
    className: "checkbox-group",
    name: "checkbox-group-1478704652409",
    values: [
      {
        label: "Option 1",
        value: "option-1",
        selected: true
      },
      {
        label: "Option 2",
        value: "option-2"
      },
      {
        label: "Option 3",
        value: "option-3",
        selected: true
      }
    ]
  },
  {
    type: "select",
    label: "Select",
    className: "form-control",
    name: "select-1478701076382",
    values: [
      {
        label: "Option 1",
        value: "option-1",
        selected: true
      },
      {
        label: "Option 2",
        value: "option-2"
      },
      {
        label: "Option 3",
        value: "option-3"
      }
    ]
  },
  {
    type: "textarea",
    label: "Text Area",
    className: "form-control",
    name: "textarea-1478701077511"
  }
];
jQuery(function($) {
  const formData = JSON.stringify(originalFormData);

  $(fbRender).formRender({ formData });
  getUserDataBtn.addEventListener(
    "click",
    () => {
      window.alert(window.JSON.stringify($(fbRender).formRender("userData")));
    },
    false
  );
});