Красивые табы:
1. обернуть контент в div (class="tabs")
2. каждый таб есть три элемента:
    <input name="tabs" type="radio" id="{{ уникальный id таба, например tab-1 }}" checked="checked" class="input"/>
    <label for="{{ id таба }}" class="label">{{ Название таба. Например, Шифрование }}</label>
    <div class="panel">
        {{ Контент таба }}
    </div>
3. Атрибут checked="checked" задает изначально выбранный таб