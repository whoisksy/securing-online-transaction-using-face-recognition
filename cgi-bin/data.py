#!C:/Python36/python
from flask import Flask, render_template

app = Flask('testapp')

@app.route('/')
def index():
    return render_template('cherry.html', var='12345')

if __name__ == '__main__':
    app.run()
