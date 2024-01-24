from flask import Flask, render_template, request, redirect, url_for

app = Flask(__name__)

# Список пользователей (обычно хранится в базе данных)
users = []


@app.route('/')
def index():
    return render_template('index.html')


@app.route('/register', methods=['POST'])
def register():
    username = request.form['username']
    password = request.form['password']

    # Создаем нового пользователя и добавляем его в список
    user = {
        'username': username,
        'password': password
    }
    users.append(user)

    return redirect(url_for('success', username=username))


@app.route('/success/<username>')
def success(username):
    return f'Registration successful! Welcome, {username}!'


if __name__ == '__main__':
    app.run(debug=True)
