window.onload = () => {

    const issuesTableBody = document.getElementById('issues-body');
    fetch('./../php/get-issues.php')
        .then((res) => {
            res.text().then((text) => {
                issuesTableBody.innerHTML = text
            })
        })

    const allIssuesBtn = document.getElementById('allissues')
    const myIssuesBtn = document.getElementById('myissues')
    const openIssuesBtn = document.getElementById('openissues')

    allIssuesBtn.addEventListener('click', () => {
        fetch('./../php/get-issues.php')
            .then((res) => {
                res.text().then((text) => {
                    issuesTableBody.innerHTML = text
                })
            })

        allIssuesBtn.classList.add('selected-filter')
        myIssuesBtn.classList.remove('selected-filter')
        openIssuesBtn.classList.remove('selected-filter')
    })

    myIssuesBtn.addEventListener('click', () => {
        fetch('./../php/get-issues.php?filter=my-issues')
            .then((res) => {
                res.text().then((text) => {
                    issuesTableBody.innerHTML = text
                })
            })

        allIssuesBtn.classList.remove('selected-filter')
        myIssuesBtn.classList.add('selected-filter')
        openIssuesBtn.classList.remove('selected-filter')
    })

    openIssuesBtn.addEventListener('click', () => {
        fetch('./../php/get-issues.php?filter=open')
            .then((res) => {
                res.text().then((text) => {
                    issuesTableBody.innerHTML = text
                })
            })

        allIssuesBtn.classList.remove('selected-filter')
        myIssuesBtn.classList.remove('selected-filter')
        openIssuesBtn.classList.add('selected-filter')
    })


}