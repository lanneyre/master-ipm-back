document.addEventListener('DOMContentLoaded', () => {
    const questions = document.querySelectorAll('.question');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const questionSelector = document.getElementById('questionSelector');
    let currentIndex = 0;

    function showQuestion(index) {
        questions[currentIndex].classList.remove('activeq');
        questions[index].classList.add('next');

        setTimeout(() => {
            questions[index].classList.remove('next');
        }, 500);

        questions[index].classList.add('activeq');
        currentIndex = index;
        questionSelector.value = index.toString();
        checkQuestions();
    }

    function checkQuestion(index) {
        const radios = questions[index].querySelectorAll('input[type="radio"]');
        let answered = false;
        radios.forEach(radio => {
            if (radio.checked) {
                answered = true;
            }
        });
        return answered;
    }
    function checkQuestions() {
        let nbCheck = 0;
        questions.forEach((q, i) => {
            if (checkQuestion(i)) {
                questionSelector.querySelector(".linkQuestion[rel-question=\"" + i + "\"]").innerHTML = " x ";
                nbCheck++;
            } else {
                questionSelector.querySelector(".linkQuestion[rel-question=\"" + i + "\"]").innerHTML = " o ";
            }
        });
        if (nbCheck == questions.length) {
            if (confirm("Voulez envoyer vos réponses ?")) {
                document.getElementById("QCM").submit();
            }
        }
    }

    prevBtn.addEventListener('click', (e) => {
        e.preventDefault()
        const newIndex = (currentIndex - 1 + questions.length) % questions.length;
        showQuestion(newIndex);
    });

    nextBtn.addEventListener('click', (e) => {
        e.preventDefault()
        const newIndex = (currentIndex + 1) % questions.length;
        showQuestion(newIndex);
    });

    questionSelector.querySelectorAll(".linkQuestion").forEach((linkQuestion) => {
        linkQuestion.addEventListener("click", (question) => {
            question.preventDefault()
            const newIndex = parseInt(question.target.getAttribute("rel-question"));
            //currentIndex = parseInt(question.target.getAttribute("rel-question"));
            showQuestion(newIndex);
        });
    })


});
