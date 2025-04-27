const saveDetails = ()=>{
    const rollno = document.getElementById('studentRoll').value
    const name = document.getElementById('studentName').value
    const clas = document.getElementById('studentClass').value
    const studentMath = parseFloat(document.getElementById('studentMath').value)
    const studentScience = parseFloat(document.getElementById('studentScience').value)
    const studentEnglish = parseFloat(document.getElementById('studentEnglish').value)
    const studentComputer = parseFloat(document.getElementById('studentComputer').value)
    const student = {
        rollno: rollno,
        name: name,
        class: clas,
        marks: [studentMath, studentScience, studentEnglish, studentComputer],
        average(){
            let total = 0
            this.marks.forEach(mk=> total +=mk)
            return total/4
        }
    }
    document.getElementById('studentForm').reset()
    const x = document.getElementById('detailsrow')
    x.innerHTML = `<td>${student.rollno}</td>
                            <td>${student.name}</td>
                            <td>${student.class}</td>
                            <td>${student.marks[0]}</td>
                            <td>${student.marks[1]}</td>
                            <td>${student.marks[2]}</td>
                            <td>${student.marks[3]}</td>
                            <td>${student.average()}</td>`        
	
}

