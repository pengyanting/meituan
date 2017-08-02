var myjs = {
    //字符串操作
    str: {
        /**
         * 去除字符串的空格
         * str 需要格式化的字符串
         * type 类型 1-所有空格 2-前后空格 3-前空格 4-后空格
         */
        trim: function (str, type) {
            switch (type) {
                case 1: return str.replace(/\s+/g, "");
                case 2: return str.replace(/(^\s*)|(\s*$)/g, "");
                case 3: return str.replace(/(^\s*)/g, "");
                case 4: return str.replace(/(\s*$)/g, "");
                default: return str;
            }
        },
        /**
         * 字母大小写切换
         * str 字符串
         * type 类型 1-首字母大写 2-首字母小写 3-大小写转换 4-全部大写 5-全部小写
         */
        changeCase: function (str, type) {
            function toggleCase(str) {
                var itemText = "";
                str.split("").forEach(function (item) {
                    if (/^([a-z])+/.test(item)) {
                        itemText += item.toUpperCase();
                    } else if (/^([A-Z])+/.test(item)) {
                        itemText += item.toLowerCase();
                    } else {
                        itemText += item;
                    }
                });
                return itemText
            }
            switch (type) {
                case 1: return str.replace(/^(\w)(\w+)/, function (v1, v2, v3) {
                    console.log(v1 + '---' + v2 + '---' + v3)
                    return v2.toUpperCase() + v3.toLowerCase();
                });
                case 2: return str.replace(/^(\w)(\w+)/, function (v1, v2, v3) {
                    console.log(v1 + '---' + v2 + '---' + v3)
                    return v2.toLowerCase() + v3.toUpperCase();
                });
                case 3: return toggleCase(str);
                case 4: return str.toUpperCase();//小写
                case 5: return str.toLowerCase();//大写
            }
        },
        /**
         * 字符串循环复制
         * str
         * count 循环次数
         */
        repeatStr: function (str, count) {
            var text = '';
            for (var i = 0; i < count; i++) {
                text += str;
            }
            return text
        },
        /**
         * 字符串替换（字符串，要替换的字符串，替换成什么）
         */
        replaceAll: function (str, str1, str2) {
            var raRegExp = new RegExp(str1, 'g');
            return str.replace(raRegExp, str2);
        },
        /**
         * 替换*
         * replaceStr(字符串,字符格式, 替换方式,替换的字符（默认*）)
         */
        replaceStr: function (str, regArr, type, ARepText) {
            var regtext = '', Reg = null, replaceText = ARepText || '*';
            //replaceStr('18819322663',[3,5,3],0)
            //188*****663
            //repeatStr是在上面定义过的（字符串循环复制），大家注意哦
            if (regArr.length === 3 && type === 0) {
                regtext = '(\\w{' + regArr[0] + '})\\w{' + regArr[1] + '}(\\w{' + regArr[2] + '})'
                Reg = new RegExp(regtext);
                var replaceCount = myjs.str.repeatStr(replaceText, regArr[1]);
                return str.replace(Reg, '$1' + replaceCount + '$2')
            }
            //replaceStr('asdasdasdaa',[3,5,3],1)
            //***asdas***
            else if (regArr.length === 3 && type === 1) {
                regtext = '\\w{' + regArr[0] + '}(\\w{' + regArr[1] + '})\\w{' + regArr[2] + '}'
                Reg = new RegExp(regtext);
                var replaceCount1 = myjs.str.repeatStr(replaceText, regArr[0]);
                var replaceCount2 = myjs.str.repeatStr(replaceText, regArr[2]);
                return str.replace(Reg, replaceCount1 + '$1' + replaceCount2)
            }
            //replaceStr('1asd88465asdwqe3',[5],0)
            //*****8465asdwqe3
            else if (regArr.length === 1 && type == 0) {
                regtext = '(^\\w{' + regArr[0] + '})'
                Reg = new RegExp(regtext);
                var replaceCount = myjs.str.repeatStr(replaceText, regArr[0]);
                return str.replace(Reg, replaceCount)
            }
            //replaceStr('1asd88465asdwqe3',[5],1,'+')
            //"1asd88465as+++++"
            else if (regArr.length === 1 && type == 1) {
                regtext = '(\\w{' + regArr[0] + '}$)'
                Reg = new RegExp(regtext);
                var replaceCount = myjs.str.repeatStr(replaceText, regArr[0]);
                return str.replace(Reg, replaceCount)
            }
        },
        /**
         * 检测字符串
         * checkType('18016578890','phone');
         * str
         * type:类型
         */
        checkType: function (str, type) {
            switch (type) {
                case 'phone':
                    return /^1[3|4|5|7|8][0-9]{9}$/.test(str);
                case 'email':
                    return /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/.test(str);
                case 'tel':
                    return /^(0\d{2,3}-\d{7,8})(-\d{1,4})?$/.test(str);
                case 'number':
                    return /^[0-9]$/.test(str);
                case 'english':
                    return /^[a-zA-Z]+$/.test(str);
                case 'chinese':
                    return /^[\u4E00-\u9FA5]+$/.test(str);
                case 'lower':
                    return /^[a-z]+$/.test(str);
                case 'upper':
                    return /^[A-Z]+$/.test(str);
                default:
                    return true;
            }
        },
        /**
         * 检测密码强度
         */
        checkPwd: function (str) {
            var nowLv = 0;
            if (str.length < 6) {
                return nowLv
            }
            ;
            if (/[0-9]/.test(str)) {
                nowLv++
            }
            ;
            if (/[a-z]/.test(str)) {
                nowLv++
            }
            ;
            if (/[A-Z]/.test(str)) {
                nowLv++
            }
            ;
            if (/[\.|-|_]/.test(str)) {
                nowLv++
            }
            ;
            return nowLv;
        },
        /**
         * 随机数
         * count:2-36之间的数字，代表进制
         */
        randomNumber: function (count) {
            return Math.random().toString(count).substring(2);
        },
        /**
         * 查找字符串在某段字符串中出现的次数
         * str:某段字符串
         * strSplit:要查找的字符串
         * 例：aa在字符串‘aajjjkasjjaajjJJAAAaaa’中出现的次数
         */
        countStr: function (str, strSplit) {
            return str.split(strSplit).length - 1
        }
    },
    arr: {
        /**
         * 数组去重
         * 使用es6的from方法：把类似数组的对象转换为数组
         * ES6新增的Set数据结构，类似于数组，但是里面的元素都是唯一的 ，其构造函数可以接受一个数组作为参数
         */
        removeRepeatArray: function (arr) {
            return Array.from(new Set(arr));
        },
        /**
         * 打乱数组顺序
         */
        upsetArr: function (arr) {
            return arr.sort(function () {
                return Math.random() - 0.5;
            })
        },
        /**
         * 数组最大值
         */
        maxArr: function (arr) {
            return Math.max.apply(null, arr);
        },
        /**
         * 数组最小值
         */
        minArr: function (arr) {
            return Math.min.apply(null, arr);
        },
        /**
         * 数组求和
         */
        sumArr: function (arr) {
            var sum = 0;
            for (var i = 0; i < arr.length; i++) {
                sum += arr[i];
            }
            return sum
        },
        /**
         * 数组平均值
         */
        covArr: function (arr) {
            var sumText = myjs.array.sumArr(arr);
            var covText = sumText / arr.length;
            return covText
        },
        /**
         * 数组中随机获取元素
         */
        randomOne: function (arr) {
            return arr[Math.floor(Math.random() * arr.length)]
        },
        /**
         * 返回数组（字符串）一个元素出现的次数
         */
        getEleCount: function (obj, ele) {
            var num = 0;
            for (var i = 0; i < obj.lnegth; i++) {
                if (obj[i] == ele) {
                    num++;
                }
            }
            return num;
        },
        /**
         * 返回数组（字符串）出现最多的几次元素和出现次数
         * arr
         * rank:长度，默认为数组的长度
         * rankType：排序方式，默认为降序,1为升序
         */
        getCount: function (arr, rank, rankType) {
            var obj = {}, k, arr1 = []
            //记录每一元素出现的次数
            for (var i = 0, len = arr.length; i < len; i++) {
                k = arr[i];
                if (obj[k]) {
                    obj[k]++;
                }
                else {
                    obj[k] = 1;
                }
            }
            //保存结果{el-'元素'，count-出现次数}
            for (var o in obj) {
                arr1.push({ el: o, count: obj[o] });
            }
            //排序（降序）
            arr1.sort(function (n1, n2) {
                return n2.count - n1.count
            });
            //如果ranktype为1，则为升序，反转数组
            if (ranktype === 1) {
                arr1 = arr1.reverse();
            }
            var rank1 = rank || arr1.length;
            return arr1.slice(0, rank1);
        },
        /**
         * 得到n1-n2下标的数组
         * n2不传时默认返回n1到数组结束的元素
         */
        getArrayNum: function (arr, n1, n2) {
            var arr1 = [], len = n2 || arr.length - 1;
            for (var i = n1; i <= len; i++) {
                arr1.push(arr[i])
            }
            return arr1;
        },
        /**
         * 筛选数组
         * removeArrayForValue(['test','test1','test2','test','aaa'],'test','%')
         * ["aaa"]   带有'test'的都删除
         * removeArrayForValue(['test','test1','test2','test','aaa'],'test')
         * ["test1", "test2", "aaa"]  数组元素的值全等于'test'才被删除
         */
        removeArrayForValue: function (arr, val, type) {
            arr.filter(function (item) { return type === '%' ? item.indexOf(val) !== -1 : item !== val })
        }
    },
    other: {
        setCookie(name, value, iDay) {
            var oDate = new Date();
            oDate.setDate(oDate.getDate() + iDay);
            document.cookie = name + '=' + value + ';expires=' + oDate;
        },
        getCookie(name) {
            var arr = document.cookie.split('; ');
            for (var i = 0; i < arr.length; i++) {
                var arr2 = arr[i].split('=');
                if (arr2[0] == name) {
                    return arr2[1];
                }
            }
            return '';
        },
        removeCookie(name) {
            setCookie(name, 1, -1);
        },
        /**
         * 清除对象中值为空的属性
         */
        filterParams(obj) {
            let _newPar = {};
            for (let key in obj) {
                if ((obj[key] === 0 || obj[key]) && obj[key].toString().replace(/(^\s*)|(\s*$)/g, '') !== '') {
                    _newPar[key] = obj[key];
                }
            }
            return _newPar;
        },
        /**
         * 现金额大写转换函数
         * @param {*} n 
         */
        upDigit(n) {
            var fraction = ['角', '分', '厘'];
            var digit = ['零', '壹', '贰', '叁', '肆', '伍', '陆', '柒', '捌', '玖'];
            var unit = [['元', '万', '亿'], ['', '拾', '佰', '仟']];
            var head = n < 0 ? '欠人民币' : '人民币';
            n = Math.abs(n);
            var s = '';
            for (var i = 0; i < fraction.length; i++) {
                s += (digit[Math.floor(n * 10 * Math.pow(10, i)) % 10] + fraction[i]).replace(/零./, '');
            }
            s = s || '整';
            n = Math.floor(n);
            for (var i = 0; i < unit[0].length && n > 0; i++) {
                var p = '';
                for (var j = 0; j < unit[1].length && n > 0; j++) {
                    p = digit[n % 10] + unit[1][j] + p;
                    n = Math.floor(n / 10);
                }
                //s = p.replace(/(零.)*零$/, '').replace(/^$/, '零')+ unit[0][i] + s; 
                s = p + unit[0][i] + s;
            }
            return head + s.replace(/(零.)*零元/, '元').replace(/(零.)+/g, '零').replace(/^整$/, '零元整');
        },
        /**
         * 获取url参数
         * 返回值{aa:'aa'}
         */
        getUrlPrmt(url) {
            url = url ? url : window.location.href;
            let _pa = url.substring(url.indexOf('?') + 1), _arrS = _pa.split('&'), _rs = {};
            for (let i = 0, _len = _arrS.length; i < _len; i++) {
                let pos = _arrS[i].indexOf('=');
                if (pos == -1) {
                    continue;
                }
                let name = _arrS[i].substring(0, pos), value = window.decodeURIComponent(_arrS[i].substring(pos + 1));
                _rs[name] = value;
            }
            return _rs;
        },
        /**
         * 设置url参数
         */
        setUrlPrmt(obj) {
            let _rs = [];
            for (let p in obj) {
                if (obj[p] != null && obj[p] != '') {
                    _rs.push(p + '=' + obj[p])
                }
            }
            return _rs.join('&');
        },
        /**
         * 随机返回一个范围的数字
         */
        randomNumber(n1, n2) {
            //randomNumber(5,10)
            //返回5-10的随机整数，包括5，10
            if (arguments.length === 2) {
                return Math.round(n1 + Math.random() * (n2 - n1));
            }
            //randomNumber(10)
            //返回0-10的随机整数，包括0，10
            else if (arguments.length === 1) {
                return Math.round(Math.random() * n1)
            }
            //randomNumber()
            //返回0-255的随机整数，包括0，255
            else {
                return Math.round(Math.random() * 255)
            }
        },
        /**
         * 随机产生颜色
         */
        randomColor() {
            //randomNumber是上面定义的函数
            //写法1
            //return 'rgb(' + randomNumber(255) + ',' + randomNumber(255) + ',' + randomNumber(255) + ')';

            //写法2
            //return '#' + Math.random().toString(16).substring(2).substr(0, 6);

            //写法3
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += '0123456789abcdef'[randomNumber(15)];
            }
            return color;
        },
        /**
         * 到某一个时间的倒计时
         * getEndTime('2017/7/22 16:0:0')
         */
        getEndTime(endTime) {
            var startDate = new Date();  //开始时间，当前时间
            var endDate = new Date(endTime); //结束时间，需传入时间参数
            var t = endDate.getTime() - startDate.getTime();  //时间差的毫秒数
            var d = 0, h = 0, m = 0, s = 0;
            if (t >= 0) {
                d = Math.floor(t / 1000 / 3600 / 24);
                h = Math.floor(t / 1000 / 60 / 60 % 24);
                m = Math.floor(t / 1000 / 60 % 60);
                s = Math.floor(t / 1000 % 60);
            }
            var date={
                hours:d*24+h,
                minutes:m,
                seconds:s
            }
            return date;
        }
    }
}

export default myjs
// https://segmentfault.com/a/1190000010225928#articleHeader39