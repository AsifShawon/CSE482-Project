$(document).ready(function () {
    $('#ask-btn').click(function (e) {
        e.preventDefault(); // Prevent the default form submission behavior

        var title = $('#title').val();
        var description = $('#textarea1').val();

        // Create HTML for the new question
        var newQuestionHTML = `
            <div class="question">
                <h3><strong>${title}</strong></h3>
                <figure>
                    <blockquote class="blockquote">
                        <p>${description}</p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        <cite title="Source Title">Your Name</cite>
                    </figcaption>
                </figure>
                <button>Answer</button>
            </div>
        `;

        // Append the new question HTML to the .questions container
        $('.ques').append(newQuestionHTML);

        // Clear input fields after adding the question
        $('#title').val('');
        $('#textarea1').val('');
    });
});
