package course_Predction;

import weka.core.Attribute;
import weka.core.DenseInstance;
import weka.core.Instances;
import weka.classifiers.Classifier;
import weka.core.SerializationHelper;
import java.util.ArrayList;

public class year3 {
    
      public static void main(String[] args) {
    
          if (args.length < 8) {
            System.out.println("خطأ: لا توجد معطيات كافية");
            return;
        }
          try {
                int School_Percentageval = Integer.parseInt(args[0]);
                int Aptitude_Testval = Integer.parseInt(args[1]);
                int Acadmic_Achievementval = Integer.parseInt(args[2]);
                int Programming1val = Integer.parseInt(args[3]);
                int Programming2val = Integer.parseInt(args[4]);
                int Data_Structureval = Integer.parseInt(args[5]);
                int Visual_Programmingval = Integer.parseInt(args[6]);
                int School_typeval = Integer.parseInt(args[7]);             
               
                year3 sp = new year3();
                double color = sp.predictcolor(School_Percentageval, Aptitude_Testval, Acadmic_Achievementval, Programming1val, Programming2val, Data_Structureval, Visual_Programmingval,School_typeval);
                System.out.println(Math.round(color));
            } catch (NumberFormatException e) {
                System.out.println("خطأ في نوع البيانات المدخلة, يجب ان تكون من ارقام فقط.");
            } catch (Exception e) {
                System.out.println("خطأ: " + e.getMessage());
            }
        }
            public double predictcolor(int School_Percentageval,int Aptitude_Testval, int Acadmic_Achievementval, int Programming1val, int Programming2val, int Data_Structureval , int Visual_Programmingval , int School_typeval) {
            try {
                // تعريف السمات
                Attribute School_Percentage = new Attribute("School_Percentage");
                Attribute Aptitude_Test = new Attribute("Aptitude_Test");
                Attribute Acadmic_Achievement = new Attribute("Acadmic_Achievement");
                Attribute Programming1 = new Attribute("Programming1");
                Attribute Programming2 = new Attribute("Programming2");
                Attribute Data_Structure = new Attribute("Data_Structure");
                Attribute Visual_Programming = new Attribute("Visual_Programming");
                Attribute School_type = new Attribute("School_type");
                Attribute Color = new Attribute("Color");

                ArrayList attributes = new ArrayList();
                attributes.add(School_Percentage);
                attributes.add(Aptitude_Test);
                attributes.add(Acadmic_Achievement);
                attributes.add(Programming1);
                attributes.add(Programming2);
                attributes.add(Data_Structure);
                attributes.add(Visual_Programming);
                attributes.add(School_type);
                attributes.add(Color);

                // إنشاء مجموعة بيانات جديدة
                Instances dataset = new Instances("SubjectColorPrediction", attributes, 0);
                dataset.setClassIndex(dataset.numAttributes() - 1);  
                
                DenseInstance instance = new DenseInstance(9);
                instance.setValue(School_Percentage,School_Percentageval);
                instance.setValue(Aptitude_Test,Aptitude_Testval);
                instance.setValue(Acadmic_Achievement,Acadmic_Achievementval);
                instance.setValue(Programming1,Programming1val);
                instance.setValue(Programming2,Programming2val);
                instance.setValue(Visual_Programming,Data_Structureval);
                instance.setValue(Data_Structure,Visual_Programmingval);
                instance.setValue(School_type,School_typeval);

                // إضافة المثيل إلى مجموعة البيانات
                dataset.add(instance);

            Classifier cls = (Classifier) SerializationHelper.read("D:\\Subject_Prediction(year3)\\Subject_Prediction(Year3).model");

                double predictedcolor = cls.classifyInstance(dataset.instance(0));
                return predictedcolor;
            } catch (Exception e) {
                return -1; 
            }

    
    
    }
    
}
