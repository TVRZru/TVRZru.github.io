from flask import Flask, render_template, request

app = Flask(__name__)

@app.route('/')
def home():
    return render_template('index.html')

@app.route('/register', methods=['POST'])
def register():
    username = request.form['username']
    password = request.form['password']
    # Здесь можно добавить код для сохранения данных пользователя

    return render_template('success.html', username=username)

if __name__ == '__main__':
    app.run(debug=True)
