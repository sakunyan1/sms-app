from flask import Flask, request, Response
from plivo import plivoxml

app = Flask(__name__)


@app.route('/autoresponder/', methods=['GET', 'POST'])
def autoresponder():
    from_number = request.values.get('From')
    to_number = request.values.get('To')
    text = request.values.get('Text')

    if text.lower() == 'interested':
        body = "Thank you for showing interest. One of our agents will contact you."
    else:
        body = "Reply 'Interested' to connect with our agents"
    
    response = plivoxml.ResponseElement()
    response.add(plivoxml.MessageElement(body, src=to_number,
                 dst=from_number))
    return Response(response.to_string(), mimetype='application/xml')

if __name__ == '__main__':
    app.run(host='0.0.0.0', debug=True)
