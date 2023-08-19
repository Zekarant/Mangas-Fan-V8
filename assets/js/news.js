function likeNews(newsId) {
    sendReaction('/news/' + newsId + '/like', newsId, 'like');
}

function dislikeNews(newsId) {
    sendReaction('/news/' + newsId + '/dislike', newsId, 'dislike');
}

function sendReaction(url, newsId, reactionType) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.message) {
                    updateReactionsCount(newsId, reactionType, response.message);
                } else if (response.error) {
                    console.error('Erreur de ' + reactionType + ' :', response.error);
                }
            } else {
                console.error('Erreur de ' + reactionType + ' :', JSON.parse(xhr.responseText).error);
            }
        }
    };

    xhr.send();
}

function updateReactionsCount(newsId, reactionType, message) {
    var reactionsCountElement = document.getElementById(reactionType + '-count-' + newsId);
    if (reactionsCountElement) {
        var reactionsCount = parseInt(reactionsCountElement.innerText);
        reactionsCountElement.innerText = reactionsCount + 1;
    }

    var messageElement = document.getElementById('message');
    if (messageElement) {
        messageElement.innerText = message;
    }
}

