from flask import Flask, render_template, request
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'data.db'  # Замените путь к файлу
db = SQLAlchemy(app)

class User(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    nickname = db.Column(db.String(50))
    password = db.Column(db.String(50))
    product = db.Column(db.String(50))

@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        nickname = request.form['nickname']
        password = request.form['password']
        product = request.form['product']

        user = User(nickname=nickname, password=password, product=product)
        db.session.add(user)
        db.session.commit()

        return 'Данные успешно сохранены!'
    return render_template('index.html')

if __name__ == '__main__':
    app.run(debug=True)
