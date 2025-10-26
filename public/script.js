$(document).ready(function () {
    // Elements
    const createTaskModal = $("#createTaskModal");
    const transferTaskModal = $("#transferTaskModal");
    const alertOverlay = $("#alertOverlay");
    const createTaskForm = createTaskModal.find("form");
    const transferTaskForm = transferTaskModal.find("form");
    let currentTaskData = {};

    // Open Create Task Modal
    $("#createTaskBtn").on("click", function () {
        createTaskModal.addClass("active");
        $("body").css("overflow", "hidden");
    });

    // Close Create Task Modal
    $("#closeCreateTaskModal").on("click", function () {
        createTaskModal.removeClass("active");
        $("body").css("overflow", "auto");
    });

    // Open Transfer Task Modal
    $("#transferTaskBtn").on("click", function () {
        transferTaskModal.addClass("active");
        $("body").css("overflow", "hidden");
    });

    // Close Transfer Task Modal
    $("#closeModal").on("click", function () {
        transferTaskModal.removeClass("active");
        $("body").css("overflow", "auto");
    });

    // Close modals when clicking outside
    [createTaskModal, transferTaskModal].forEach((modal) => {
        modal.on("click", function (e) {
            if (e.target === modal[0]) {
                modal.removeClass("active");
                $("body").css("overflow", "auto");
            }
        });
    });

    // Close alert modal
    $("#alertButton").on("click", function () {
        alertOverlay.addClass("hidden");
        $("body").css("overflow", "auto");
    });

    // Show alert function
    function showAlert(title, message, type) {
        const alertIcon = $("#alertIcon");
        const alertIconSvg = $("#alertIconSvg");
        const alertTitle = $("#alertTitle");
        const alertMessage = $("#alertMessage");

        alertTitle.text(title);
        alertMessage.text(message);

        if (type === "success") {
            alertIcon.addClass("bg-green-500").removeClass("bg-red-500 hidden");
            alertIconSvg.html(
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>'
            );
        } else if (type === "error") {
            alertIcon.addClass("bg-red-500").removeClass("bg-green-500 hidden");
            alertIconSvg.html(
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>'
            );
        }

        alertOverlay.removeClass("hidden");
        $("body").css("overflow", "hidden");

        setTimeout(() => {
            alertOverlay
                .find(".transform")
                .removeClass("opacity-0 scale-95")
                .addClass("opacity-100 scale-100");
        }, 10);
    }

    // Custom radio button behavior
    $("input[type='radio']").on("change", function () {
        const groupName = $(this).attr("name");
        $(`input[name="${groupName}"]`).each(function () {
            const label = $(`label[for="${this.id}"]`);
            const indicator = label.find("span span");
            if (this.checked) {
                indicator.removeClass("opacity-0");
            } else {
                indicator.addClass("opacity-0");
            }
        });
    });

    // Task Detail and Edit Modal
    const taskModal = $("#taskDetailModal");
    const editTaskModal = $("#editTaskModal");

    const statusColors = {
        "To do": "#e94949",
        Progress: "#ffb32d",
        Complete: "#7db445",
        Review: "#6fadc8",
    };

    const levelColors = {
        High: "#e94949",
        Medium: "#ffb32d",
        Low: "#6fadc8",
    };

    $(".task-row").on("click", function () {
        currentTaskData = {
            taskId: $(this).data("task-id"),
            taskName: $(this).data("task-name"),
            project: $(this).data("project"),
            assignee: $(this).data("assignee"),
            level: $(this).data("level"),
            status: $(this).data("status"),
            created: $(this).data("created"),
            timeline: $(this).data("timeline"),
        };

        $("#task-details-heading").text(currentTaskData.taskName);
        $("#task-project").text(currentTaskData.project);
        $("#task-assignee").text(currentTaskData.assignee);
        $("#assignee-initial").text(currentTaskData.assignee.charAt(0));
        $("#task-timeline")
            .text(currentTaskData.timeline)
            .attr("datetime", currentTaskData.timeline.replace(/\s/g, ""));

        $("#task-status")
            .html(
                `<span class="font-medium text-white text-sm">${currentTaskData.status}</span>`
            )
            .css(
                "background-color",
                statusColors[currentTaskData.status] || "#e94949"
            );

        $("#task-level")
            .html(
                `<span class="font-medium text-white text-sm">${currentTaskData.level}</span>`
            )
            .css(
                "background-color",
                levelColors[currentTaskData.level] || "#ffb32d"
            );

        taskModal.removeClass("hidden").addClass("active");
        $("body").css("overflow", "hidden");
    });

    $("#closeTaskModal").on("click", function () {
        taskModal.removeClass("active").addClass("hidden");
        $("body").css("overflow", "auto");
    });

    $("#editTaskBtn").on("click", function () {
        $("#edit-task-name").val(currentTaskData.taskName);

        $("input[name='task-level']").each(function () {
            if ($(this).val() === currentTaskData.level) {
                $(this).prop("checked", true);
                updateLevelIndicator($(this).val());
            }
        });

        taskModal.removeClass("active").addClass("hidden");
        editTaskModal.removeClass("hidden").addClass("active");
    });

    $("#closeEditTaskModal").on("click", function () {
        editTaskModal.removeClass("active").addClass("hidden");
        $("body").css("overflow", "auto");
    });

    function updateLevelIndicator(level) {
        $(".level-indicator").css("background-color", "transparent");
        $(`.level-indicator[data-level="${level}"]`).css(
            "background-color",
            levelColors[level] || "#ffb32d"
        );
    }

    $("input[name='task-level']").on("change", function () {
        updateLevelIndicator($(this).val());
    });

    $("#submitEditTask").on("click", function () {
        currentTaskData.taskName = $("#edit-task-name").val();
        currentTaskData.level = $("input[name='task-level']:checked").val();
        alert("Task updated successfully!");
        editTaskModal.removeClass("active").addClass("hidden");
        $("body").css("overflow", "auto");
    });

    [taskModal, editTaskModal].forEach((modal) => {
        modal.on("click", function (e) {
            if (e.target === modal[0]) {
                modal.removeClass("active").addClass("hidden");
                $("body").css("overflow", "auto");
            }
        });
    });

    $(document).on("keydown", function (e) {
        if (e.key === "Escape") {
            [taskModal, editTaskModal].forEach((modal) => {
                if (modal.hasClass("active")) {
                    modal.removeClass("active").addClass("hidden");
                    $("body").css("overflow", "auto");
                }
            });
        }
    });

    // Administration page - toggle user status
    const radioGroups = ["bring_laptop", "can_be_contacted"];
    radioGroups.forEach((groupName) => {
        $(`input[name="${groupName}"]`).on("change", function () {
            $(`input[name="${groupName}"]`).each(function () {
                $(this)
                    .next("img")
                    .attr(
                        "src",
                        "https://c.animaapp.com/mf0waiheGBQdaR/img/ellipse-71.svg"
                    )
                    .css("filter", "");
            });

            if ($(this).is(":checked")) {
                $(this)
                    .next("img")
                    .attr(
                        "src",
                        "https://c.animaapp.com/mf0waiheGBQdaR/img/ellipse-71.svg"
                    )
                    .css("filter", "brightness(0.8)");
            }
        });
    });

    // Date validation
    $("#start-date").on("change", function () {
        $("#end-date").attr("min", this.value);
        if ($("#end-date").val() && $("#end-date").val() < this.value) {
            $("#end-date").val("");
            alert("End date must be after start date");
        }
    });

    $("#end-date").on("change", function () {
        if ($("#start-date").val() && this.value < $("#start-date").val()) {
            $(this).val("");
            alert("End date must be after start date");
        }
    });

    // Form submission
    window.submitForm = function () {
        const form = $("form")[0];
        const formData = new FormData(form);

        if (!formData.get("leave_category")) {
            alert("Please select a leave category");
            return;
        }

        if (!formData.get("start_date") || !formData.get("end_date")) {
            alert("Please select both start and end dates");
            return;
        }

        if (!formData.get("description").trim()) {
            alert("Please enter a description");
            return;
        }

        console.log("Form Data:", Object.fromEntries(formData.entries()));
        alert("Leave request submitted successfully!");
    };

    window.resetForm = function () {
        $("form")[0].reset();
        $("input[type='radio']+img").css("filter", "none");
    };

    let selectedOptions = {};

    window.toggleDropdown = function () {
        $("#dropdownMenu").toggleClass("hidden");
        $("#dropdownMenu2").addClass("hidden");
    };

    window.toggleDropdown2 = function () {
        $("#dropdownMenu2").toggleClass("hidden");
        $("#dropdownMenu").addClass("hidden");
    };

    window.selectOption2 = function (value, text) {
        $("#selectedText2")
            .text(text)
            .removeClass("text-[#7d7d7d]")
            .addClass("text-black");
        selectedOptions["dropdown2"] = value;
        $("#dropdownMenu2").addClass("hidden");
        updateDropdownStyling("dropdownMenu2", value);
    };

    function updateDropdownStyling(dropdownId, selectedValue) {
        $(`#${dropdownId} div[onclick^="selectOption"]`).each(function () {
            const optionValue = $(this)
                .attr("onclick")
                .match(/'([^']+)'/)[1];
            if (optionValue === selectedValue) {
                $(this)
                    .removeClass("bg-white hover:bg-[#e0e0e0]")
                    .addClass("bg-[#e0e0e0] hover:bg-[#d0d0d0]");
            } else {
                $(this)
                    .removeClass("bg-[#e0e0e0] hover:bg-[#d0d0d0]")
                    .addClass("bg-white hover:bg-[#e0e0e0]");
            }
        });
    }

    $(document).on("click", function (event) {
        if (
            !$(event.target).closest('button[onclick="toggleDropdown()"]')
                .length &&
            !$("#dropdownMenu").has(event.target).length
        ) {
            $("#dropdownMenu").addClass("hidden");
        }
    });
});
